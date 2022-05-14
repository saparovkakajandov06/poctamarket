<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{


    public function index()
    {
        return response()->json([

            'newProds' => ProductResource::collection(Product::where('new', 1)->take(4)->get()),
            'recommendProds' => ProductResource::collection(Product::where('recommended', 1)->take(8)->get()),

        ]);
    }


}
