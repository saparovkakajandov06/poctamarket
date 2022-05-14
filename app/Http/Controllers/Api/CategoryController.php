<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::where('has_children',1)->
           orderBy('id', 'asc');

        if ($request->page || $request->per_page) {
            $per_page = $request->per_page ?? 10;
            $categories = $categories->paginate($per_page);

            return CategoryResource::collection($categories)->appends([
                'per_page' => $per_page
            ]);
        } else {
            $categories = $categories->get();
        }

        return CategoryResource::collection($categories);
    }
 

    public function show(Request $request)
    {
        $categories = Category::findOrFail($request->id)
            ->childrenCategories()->with('products');

        if ($request->page || $request->per_page) {
            $per_page = $request->per_page ?? 10;
            $categories = $categories->paginate($per_page);

            return CategoryResource::collection($categories)->appends([
                'per_page' => $per_page
            ]);
        } else {
            $categories = $categories->get();
        }

        return CategoryResource::collection($categories);

    }

}
