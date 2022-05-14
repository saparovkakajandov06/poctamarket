<?php

namespace App\Http\Controllers;

use App\Product;
use App\Skidka;
use App\Warn_Skidka;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsFilterRequest;

class SearchController extends SiteController
{


    public function search_post(Request $request)
    {
        $products = Product::where('name_tk', 'LIKE', '%' . $request->search . '%')->where('status',1)->get();

        $output = '';
        
        foreach ($products as $product) {
            $output .= '<div class="search_list_item">' .
                            '<img src="' . asset('images/products/smaller/' . json_decode($product->img)->main) . '" alt="">' .
                            '<a href="' . route('oneProduct',['id'=>$product->id]). '">' .
                            $product->name_tk .
                            '</a>' .
                        '</div>';
        }

        if ($output) {
            $output .=
                '<a href="' .
                route('search', ['text' => $request->search])
                . '">' . __('Gözleg netijeleri') . '<i class="icofont-arrow-right"></i></a>';
        }

        return $output;
    }


    public function gozleg(){
        return view('site.gozleg');
    }



    public function find($alias) {
        
        $dataProd = \App\Product::where('name_tk', 'like', '%'.$alias.'%')->where('status',1)->orWhere('code', 'like', "%".$alias."%")->orWhere('description_tk', 'like', "%".$alias."%")
             ->select('id', 'name_tk', 'name_ru', 'name_en', 'code', 'description_tk', 'description_ru', 'description_en')->get();
	     
        $dataCateg = \App\Category::where('name_tk', 'like', '%'.$alias.'%')->where('status',1)
            ->select('id', 'name_tk', 'name_ru', 'name_en')->get();
	    
        $data = $dataProd->merge($dataCateg);

        return $data;
    }

    public function getResults($alias,Request $request) {

        $recProds = \App\Product::where('status',1)->where('recommended',1)->take(5)->get();
        
        // split on 1+ whitespace & ignore empty (eg. trailing space)
        $searchValues = preg_split('/\s+/', $alias, -1, PREG_SPLIT_NO_EMPTY);

        $products = \App\Product::where('status',1)->where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
              $q->orWhere('name_tk', 'like', "% {$value} %")
              ->orWhere('name_en', 'like', "% {$value} %")
              ->orWhere('name_ru', 'like', "% {$value} %")
              ->orWhere('code', 'like', "%{$value}%")
                  ->orWhere('description_en', 'like', "%{$value}%")
                  ->orWhere('description_ru', 'like', "%{$value}%")
                  ->orWhere('description_tk', 'like', "%{$value}%");
            }
        })->get();


        return view('site.search_results',compact('recProds','products'))->with([
            'categories' => $this->categories,
            'cartCount' => $this->countItems($request),
            'alias' => $alias,

        ]);
    }



    public function getFilters(ProductsFilterRequest $request)
    {
        $productsQuery = Product::with(['categories','categories.products']);


        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['new', 'recommended','status'] as $field) {
            if ($request->has($field)) {
                $productsQuery->whereHas('categories.products', function ($query) use ($field) {
                    $query->$field();
                });
            }
        }

        $products = $productsQuery->paginate(12)->withPath("?".$request->getQueryString());

        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
        $news = \App\News::orderBy('id','asc')->get();
        $brands = \App\Brand::orderBy('id','asc')->get();
//        $warns = Warn_Skidka::where('created_at','desc')->take(1)->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
        $categories = \App\Category::where('status', 1)->take(12)->get();
        $colors = \App\Color::all();


        return view('site.filter_by_price_to_price', compact('products','skidkas','categories','warns','colors'));
    }

/* filter */

}
