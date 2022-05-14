<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index(Request $request)
      {
          $query = $request->input('search');

          $products = Product::
                where('name_tk', 'like', "%$query%")
              ->orWhere('name_en', 'like', "%$query%")
              ->orWhere('code', 'like', "%$query%")
              ->orWhere('description_en', 'like', "%$query%")
              ->orWhere('description_ru', 'like', "%$query%")
              ->orWhere('description_tk', 'like', "%$query%")
          ;

          if ($request->page || $request->per_page) {
              $per_page = $request->per_page ?? 10;
              $products = $products->paginate($per_page);

              return ProductResource::collection($products)->appends($request->query());
          }
          else
              {
              $products = $products->get();
          }

          return ProductResource::collection($products);
      }


    public function attributes(Request $request)
    {
        $q = $request->search;

        $products = Product::inStock()
            ->whereTranslationLike('name', '%' . $q . '%')

            ->with('categories')
            ->get();

        return [
            'min_price' => $products->min('discount_price') ?? $products->min('price'),
            'max_price' => $products->max('price'),
        ];
    }

}
