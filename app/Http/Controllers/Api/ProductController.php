<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {

        $category = Category::with('childrenCategories')->find($request->get('category'));
        $categoryIds = collect();
        if ($category) {
            $categoryIds = $category->getAllChildren()->pluck('id');
        }
        $categoryIds->prepend((int) $request->get('category'));

        $products = Product::where('availability', 1)
            ->when(
                $request->has('q'),
                fn ($query) => $query->whereTranslationLike('name', '%' . $request->q . '%', $request->lang)
            )
            ->when(
                $request->boolean('discount'),
                fn ($query) => $query->whereNotNUll('discount_price')
            )
            ->when(
                $request->has('brand'),
                fn ($query) => $query->whereIn('brand_id', explode(',', $request->get('brand')))
            )
            ->when(
                $request->has('category'),
                fn ($query) => $query->whereHas(
                    'categories',
                    fn ($query) => $query->where('id', $request->get('category'))
                )
            )
            ->when(
                $request->has(['min_price', 'max_price']),
                fn ($query) => $query->whereBetween('price', [$request->min_price, $request->max_price])
                    ->orWhereBetween('discount', [$request->min_price, $request->max_price])
            )
            ->when(
                $request->has('price'),
                fn ($query) => $query->orderBy('price', $request->get('price'))
            )
            ->when(
                $request->has('name'),
                fn ($query) => $query->orderByTranslation('name', $request->get('name'))
            )
            ->when(
                $request->has('date'),
                fn ($query) => $query->orderBy('created_at', $request->get('date'))
            );

        if ($request->page || $request->per_page) {
            $per_page = $request->per_page ?? 10;
            $products = $products->paginate($per_page);

            return ProductResource::collection($products)->appends($request->query());
        } else {
            $products = $products->get();
        }

        return ProductResource::collection($products);
    }

    public function show($id, Request $request) {
        $prod = Product::where('id',$id)->with('category_product')->get();

        $similarProducts = Product::with('category_product')->take(10)->get();
        return ProductResource::collection($prod,$similarProducts);
    }


    public function cartProductCheck(Request $request)
    {
        $validator = Validator::make($request->post(), [
            'product_ids' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'message' => 'Validation error',
            ], 400);
        }

        $products = Product::whereIn('id',$request->product_ids)
            ->get();

        return ProductResource::collection($products);
    }

   
}
