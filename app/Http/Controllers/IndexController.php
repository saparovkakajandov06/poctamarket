<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use App\Warn_Skidka;
use Illuminate\Http\Request;
// use Request;
use DB;
use App\News;
use App\Pocta;
use App\Skidka;
use Illuminate\Support\Facades\App;

class IndexController extends SiteController
{
    public function index(Request $request) {
        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $all_products = \App\Product::all();
        $newProducts = \App\Product::where('new', 1)->orderBy('created_at','desc')->take(12)->get();


//        for her
        $category = \App\Category::where('id',4)->first();
        $recomProdForHer = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        //for girls
        $category = \App\Category::where('id',28)->first();
        $recomProdForGirls = $category->products()->orderBy('id','desc')->take(8)->get();

        //for boys
        $category = \App\Category::where('id',9)->first();
        $recomProdForBoys = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        //for him
        $category = \App\Category::where('id',7)->first();
        $recomProdForHim = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        //$recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();



        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
        $news = \App\News::orderBy('id','asc')->get();
        $brands = \App\Brand::orderBy('id','asc')->get();
//        $warns = Warn_Skidka::where('created_at','desc')->take(1)->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();


        return view('site.index',compact(
            'sliderItems','newProds','all_products','newProducts','ikigapdal', 'obraz', 'news', 'brands','warns','recomProdForHer', 'recomProdForGirls', 'recomProdForBoys','recomProdForHim','skidkas'
        ))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
            'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
            'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()


        ]);
    }


    public function prodawayte(Request $request) {

        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $all_products = \App\Product::all();
        $newProducts = \App\Product::where('new', 1)->orderBy('created_at','desc')->take(12)->get();
        $news = \App\News::orderBy('id','asc')->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();


        return view('site.prodawayte',compact(
            'newProds','all_products','newProducts', 'news', 'warns','skidkas'
        ))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
            'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
            'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()


        ]);
    }



    public function mugt_eltip_berme(Request $request) {

        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $all_products = \App\Product::all();
        $newProducts = \App\Product::where('new', 1)->orderBy('created_at','desc')->take(12)->get();
        $news = \App\News::orderBy('id','asc')->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();


        return view('site.mugt_eltip_berme',compact(
            'newProds','all_products','newProducts', 'news', 'warns','skidkas'
        ))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
            'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
            'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()


        ]);
    }

    public function amatly(Request $request) {

        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $all_products = \App\Product::all();
        $newProducts = \App\Product::where('new', 1)->orderBy('created_at','desc')->take(12)->get();
        $news = \App\News::orderBy('id','asc')->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();


        return view('site.amatly_toleg_hyzmaty',compact(
            'newProds','all_products','newProducts', 'news', 'warns','skidkas'
        ))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
            'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
            'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()


        ]);
    }


    public function yenillik(Request $request) {

        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $all_products = \App\Product::all();
        $newProducts = \App\Product::where('new', 1)->orderBy('created_at','desc')->take(12)->get();
        $news = \App\News::orderBy('id','asc')->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();


        return view('site.yenillik_bn_gaytaryp_almak',compact(
            'newProds','all_products','newProducts', 'news', 'warns','skidkas'
        ))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
            'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
            'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()


        ]);
    }


    public function olceg_gora(Request $request) {

        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $all_products = \App\Product::all();
        $newProducts = \App\Product::where('new', 1)->orderBy('created_at','desc')->take(12)->get();
        $news = \App\News::orderBy('id','asc')->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();


        return view('site.olceg_gora',compact(
            'newProds','all_products','newProducts', 'news', 'warns','skidkas'
        ))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
            'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
            'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()


        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){
        $all_products = \App\Product::all();
        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
        $news = \App\News::orderBy('id','asc')->get();
        $brands = \App\Brand::orderBy('id','asc')->get();
//        $warns = Warn_Skidka::where('created_at','desc')->take(1)->get();
        $all_products = \App\Product::all();
        $colors = Color::all();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
        $categories = \App\Category::where('status', 1)->take(12)->get();
        $query = $request->input('query');
        $productsQuery = Product::where('name_tk', 'like', "%$query%")
            ->orWhere('name_ru', 'like', "%$query%")
            ->orWhere('name_en', 'like', "%$query%")
            ->orWhere('code', 'like', "%$query%")
            ->orWhere('description_en', 'like', "%$query%")
            ->orWhere('description_ru', 'like', "%$query%")
            ->orWhere('description_tk', 'like', "%$query%")
            ->paginate(12);
//
        $products = $productsQuery->withPath("?".$request->getQueryString());
//        $products = $productsQuery()->paginate(12);

        return view('site.search_results', compact('skidkas','all_products','warns','categories','colors'))->with('products',$products);
    }





    /*  public function search($alias, Request $request) {

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
      }*/


      public function store(Request $request){

        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $all_products = \App\Product::all();
        $newProducts = \App\Product::where('new', 1)->orderBy('created_at','desc')->take(12)->get();


//        for her
        $category = \App\Category::where('id',4)->first();
        $recomProdForHer = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        //for girls
        $category = \App\Category::where('id',28)->first();
        $recomProdForGirls = $category->products()->orderBy('id','desc')->take(8)->get();

        //for boys
        $category = \App\Category::where('id',9)->first();
        $recomProdForBoys = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        //for him
        $category = \App\Category::where('id',7)->first();
        $recomProdForHim = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        //$recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();



        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
        $news = \App\News::orderBy('id','asc')->get();
        $brands = \App\Brand::orderBy('id','asc')->get();
//        $warns = Warn_Skidka::where('created_at','desc')->take(1)->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();


        $request->validate([
            'email' => 'required',
        ]);
        $pocta = new Pocta();

        $pocta->email = $request->email;

        $pocta->save();

        return view('site.index',compact(
            'sliderItems','newProds','all_products','newProducts','ikigapdal', 'obraz', 'news', 'brands','warns','recomProdForHer', 'recomProdForGirls', 'recomProdForBoys','recomProdForHim','skidkas'
        ))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
            'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
            'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()


        ]);

    }


    // public function store(Request $request){

    //     $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
    //     $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
    //     $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
    //     $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
    //     $news = \App\News::orderBy('id','asc')->get();
    //     $brands = \App\Brand::orderBy('id','asc')->get();
    //     $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
    //     $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
    //     $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
    //     $all_products = \App\Product::all();


    //     $request->validate([
    //         'email' => 'required',
    //     ]);
    //     $pocta = new Pocta();

    //     $pocta->email = $request->email;

    //     $pocta->save();

    //     return view('site.index',compact(
    //         'sliderItems','newProds','all_products','ikigapdal', 'obraz', 'news', 'brands','recommendProds','warns','skidkas'
    //     ))->with([
    //         'categories'=>$this->categories,
    //         'cartCount'=>$this->countItems($request),
    //         'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
    //         'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()
    //     ]);

    // }


    /**
     * @param $categoryId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProductsByCatalog($categoryId, Request $request) {
        $category = \App\Category::where('id',$categoryId)->first();
        $prods = $category->products()->orderBy('id','desc')->paginate(12);
        $childrenCategories = \App\Category::where('category_id',$categoryId)->get();
        $recProds = \App\Product::where('status',1)->where('recommended',1)->take(5)->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
        $colors = Color::all();
        $all_products = \App\Product::all();

        if($category->has_children) {

            return view('site.product_by_cat',compact('prods','recProds','warns','colors','all_products','skidkas'))->with([
                'categories'=>$this->categories,
                'thisCategory'=>$category,
                'cartCount'=>$this->countItems($request),
                'childrenCategories'=>$childrenCategories,

            ]);
        }

        /* if (\App\Product::get('price') == 'price_asc'){
 //            $recProds = \App\Product::where('status',1)->where('recommended',1)->take(5)->get();
             $recProds = \App\Product::orderBy('price','asc')->where('status',1)->get();
         }
         elseif(\App\Product::get('price') == 'price_desc'){
             $recProds = \App\Product::orderBy('price','desc')->where('status',1)->get();
         }*/

        $parentCat = \App\Category::where('id',$category->category_id)->first();
        if($parentCat) {
            $relatedChildrenCats = \App\Category::where('category_id',$parentCat->id)->get();
        } else $relatedChildrenCats = null;

        return view('site.product_by_subcat',compact('prods','recProds','warns','colors','all_products','skidkas'))->with([
            'parentCat'=>$parentCat,
            'categories'=>$this->categories,
            'category'=>$category,
            'cartCount'=>$this->countItems($request),
            'relatedChildrenCats'=>$relatedChildrenCats,
            'currentCatId'=>$categoryId,
        ]);
    }

    public function getProductById($id, Request $request) {


        $category = \App\Category::where('id',4)->first();
        $recomProdForHer = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        //for girls
        $category = \App\Category::where('id',28)->first();
        $recomProdForGirls = $category->products()->orderBy('id','desc')->take(8)->get();

        //for boys
        $category = \App\Category::where('id',9)->first();
        $recomProdForBoys = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        //for him
        $category = \App\Category::where('id',7)->first();
        $recomProdForHim = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();

        
        $all_products = \App\Product::all();
        $request->session()->put('currentColor', null);
        $request->session()->put('currentSize', null);

        $currentUser = \Auth::user();

        $prod = \App\Product::where('id',$id)->first();
        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(12)->get();
        $recProds = \App\Product::orderBy('id', 'desc')->take(24)->get();
        $newProds = \App\Product::where('new', 1)->orderBy('created_at','asc')->take(12)->get();
        $menzes = \App\Product::orderBy('id', 'asc')->latest()->take(12)->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();

        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();

        $color_product = DB::table('color_product')->select('sizes')->get();


        $prod->img = json_decode($prod->img);
        $countPhotos = 0;
        foreach($prod->img as $key => $value) {

            $countPhotos++;

        }

        $colors = $prod->colors()->get();

        if(count($prod->categories) > 1) {
            $parentCat = $prod->categories()->where('has_children',1)->first();
            $ctgr = $prod->categories()->where('has_children',0)->first();
        } else {
            $ctgr = $prod->categories()->first();
        }

        return view('site.product_by_id',compact('prod','colors','all_products','countPhotos','recProds','menzes','color_product','currentUser','newProds','recommendProds','warns','skidkas','recomProdForHer','recomProdForGirls','recomProdForBoys','recomProdForHim'))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
            'ctgr'=>$ctgr,
            'parentCat'=>isset($parentCat) ? $parentCat : null,
        ]);
    }


    public function getProductBystryyProsmotr($id, Request $request) {
        $request->session()->put('currentColor', null);
        $request->session()->put('currentSize', null);
        $prod = \App\Product::where('id',$id)->first();
        $prod->img = json_decode($prod->img);
        $countPhotos = 0;
        foreach($prod->img as $key => $value) {
            $countPhotos++;
        }
        $colors = $prod->colors()->get();
        return response()->json([
            'colors' => $colors,
            'prod' => $prod,
        ]);
    }

    public function getSizesByColorAndProduct(Request $request,$color_id,$prod_id) {

        $prod_id = intval($prod_id);
        $color_id = intval($color_id);

        $sizes = DB::table('color_product')->where([
            ['product_id', '=', $prod_id],
            ['color_id', '=', $color_id],
        ])->get();

        $request->session()->put('currentColor',$color_id);

        return \Response::json([
            'sizes'=>$sizes,
        ]);
    }

    public function putSizeToSession(Request $request, $size) {
        $request->session()->put('currentSize',$size);
    }

    public function rate(Request $request) {
        \App\Rating::create($request->all());
    }

    public function review(Request $request) {
        auth()->user()->reviews()->create($request->all());
        return back();
    }

    public function filter(Request $request, $attr, $category, $orderDirection) {

        $c = \App\Category::find($category);
        if($attr == 'new') {
            $prods = $c->products()->where('status',1)->orderBy('new',$orderDirection)->orderBy('created_at',$orderDirection)->get();
        } else {
            $prods = $c->products()->where('status',1)->orderBy('price',$orderDirection)->get();
        }

        return \Response::json([
            'prods' => $prods,
        ]);
    }


    public function getNewProds(Request $request) {

        $newProds = \App\Product::where('new',1)->orderBy('id','desc')->paginate(24);
        $recProds = \App\Product::where('status',1)->where('recommended',1)->take(5)->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
        $all_products = \App\Product::all();


        return view('site.get_new_p', compact('recProds','newProds', 'all_products','warns','skidkas'))->with([
            'categories'=>$this->categories,
            'cartCount'=>$this->countItems($request),
        ]);
    }

    public function getNewAjax(Request $request){
        if($request->ajax())
        {
            if($request->id > 0)
            {
                $data = \App\Product::where('new',1)->where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(20)
                    ->get();
            }
            else
            {
                $data = \App\Product::where('new',1)->orderBy('id', 'DESC')
                    ->limit(20)
                    ->get();
            }
            $output = '';
            $last_id = '';

            if(!$data->isEmpty())
            {
                foreach($data as $row)
                {
                    $output .= '
        <a href="'. route('oneProduct',['id'=>$row->id]).'" class="card card-search">
            <div class="card-img">
                <img src="/images/products/smaller/' . json_decode($row->img)->main.'" alt="">
               
                    <p class="new">Täze</p>
                
            </div>
            <p class="product-title">'.$row->name_tk.'</p>
            <div class="d-flex spacebetween">
                <h5 class="price">'.number_format($row->price,2,'.','') .'TMT</h5>
            </div>
        </a>';
                    $last_id = $row->id;
                }
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Ýene görkez</button>
       </div>
       ';
            }
            else
            {
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
            }
            echo $output;
        }
    }

    public function news( Request $request){

        if(false){
            try{
                $nowost = News::where('id', false)->first();
                $allnews = News::all();
                $title = $nowost->title;
                $description = $nowost->short_title.' Türkmen hemrasy';
            }catch(Exception $e){
                return abort('404');
            }

            return view('site.singleNews', compact('title', 'description', 'nowost', 'allnews'));
        }else{
            $all_products = \App\Product::all();
            $title = 'Habarlar';
            $description = 'Habarlar';

            $iki_uly = News::orderBy('created_at', 'desc')->where('is_big', 1)->take(2)->get();
            $paginator = News::orderBy('created_at', 'desc')->where('is_big', null)->paginate(6);
            $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
            $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
            $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
            $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
            $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
            $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
            $news = \App\News::orderBy('id','asc')->get();
            $brands = \App\Brand::orderBy('id','asc')->get();
            $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
            $categories = \App\Category::where('status', 1)->take(12)->get();


            return view('site.news', compact('title', 'description','all_products', 'paginator','iki_uly','skidkas','warns','categories','warns'));
        }
    }



    public function news_profile($id){

        $news = News::findOrFail($id);
        $all_products = \App\Product::all();
        $paginator = News::orderBy('created_at', 'desc')->where('is_big', null)->paginate(4);
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();

        $brands = \App\Brand::orderBy('id','asc')->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $categories = \App\Category::where('status', 1)->take(12)->get();

        return view('site.news_detail',compact('skidkas','categories','all_products','warns','paginator'))->with([
            'news' => $news,

        ]);


    }


    public function sidedrawer(){

        $paginator = News::orderBy('created_at', 'desc')->where('is_big', null)->paginate(4);
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();

        $brands = \App\Brand::orderBy('id','asc')->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $categories = \App\Category::where('status', 1)->take(12)->get();
        $all_products = \App\Product::all();

        return view('site.sidedrawer',compact('skidkas','categories','all_products','warns','paginator'));


    }

    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();

    }

}






//<?php
//
//namespace App\Http\Controllers;
//
//use App\Color;
//use App\Product;
//use App\Warn_Skidka;
//use Illuminate\Http\Request;
//// use Request;
//use DB;
//use App\News;
//use App\Pocta;
//use App\Skidka;
//
//class IndexController extends SiteController
//{
//    public function index(Request $request) {
//        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
//        $newProds = \App\Product::where('new',1)->orderBy('id','desc')->latest()->take(4)->get();
//
//
//        //for her
//        $category = \App\Category::where('id',4)->first();
//        $recomProdForHer = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();
//
//        //for girls
//        $category = \App\Category::where('id',28)->first();
//        $recomProdForGirls = $category->products()->orderBy('id','desc')->take(8)->get();
//
//        //for boys
//        $category = \App\Category::where('id',9)->first();
//        $recomProdForBoys = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();
//
//        //for him
//        $category = \App\Category::where('id',7)->first();
//        $recomProdForHim = $category->products()->where('status',1)->orderBy('id','desc')->take(8)->get();
//
//        //$recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
//
//
//
//        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
//        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
//        $news = \App\News::orderBy('id','asc')->get();
//        $brands = \App\Brand::orderBy('id','asc')->get();
////        $warns = Warn_Skidka::where('created_at','desc')->take(1)->get();
//        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//
//
//        return view('site.index',compact(
//                'sliderItems','newProds','ikigapdal', 'obraz', 'news', 'brands','warns','recomProdForHer', 'recomProdForGirls', 'recomProdForBoys','recomProdForHim','skidkas'
//            ))->with([
//                'categories'=>$this->categories,
//                'cartCount'=>$this->countItems($request),
//                'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
//                'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()
//            ]);
//    }
//
//    /**
//     * @param Request $request
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function search(Request $request){
//        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
//        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
//        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
//        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
//        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
//        $news = \App\News::orderBy('id','asc')->get();
//        $brands = \App\Brand::orderBy('id','asc')->get();
////        $warns = Warn_Skidka::where('created_at','desc')->take(1)->get();
//        $colors = Color::all();
//        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//        $categories = \App\Category::where('status', 1)->take(12)->get();
//        $query = $request->input('query');
//        $productsQuery = Product::where('name_tk', 'like', "%$query%")
//            ->orWhere('name_ru', 'like', "%$query%")
//            ->orWhere('name_en', 'like', "%$query%")
//            ->orWhere('code', 'like', "%$query%")
//            ->orWhere('description_en', 'like', "%$query%")
//            ->orWhere('description_ru', 'like', "%$query%")
//            ->orWhere('description_tk', 'like', "%$query%")
//            ->paginate(12);
////
//        $products = $productsQuery->withPath("?".$request->getQueryString());
////        $products = $productsQuery()->paginate(12);
//
//        return view('site.search_results', compact('skidkas','warns','categories','colors'))->with('products',$products);
//    }
//
//
//
//
//    /*  public function search($alias, Request $request) {
//
//          $recProds = \App\Product::where('status',1)->where('recommended',1)->take(5)->get();
//
//
//
//          // split on 1+ whitespace & ignore empty (eg. trailing space)
//          $searchValues = preg_split('/\s+/', $alias, -1, PREG_SPLIT_NO_EMPTY);
//
//          $products = \App\Product::where('status',1)->where(function ($q) use ($searchValues) {
//              foreach ($searchValues as $value) {
//                      $q->orWhere('name_tk', 'like', "% {$value} %")
//                      ->orWhere('name_en', 'like', "% {$value} %")
//                      ->orWhere('name_ru', 'like', "% {$value} %")
//                      ->orWhere('code', 'like', "%{$value}%")
//                      ->orWhere('description_en', 'like', "%{$value}%")
//                      ->orWhere('description_ru', 'like', "%{$value}%")
//                      ->orWhere('description_tk', 'like', "%{$value}%");
//              }
//          })->get();
//
//
//          return view('site.search_results',compact('recProds','products'))->with([
//              'categories' => $this->categories,
//              'cartCount' => $this->countItems($request),
//              'alias' => $alias,
//
//          ]);
//      }*/
//
//
//
//
//    public function store(Request $request){
//
//        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
//        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
//        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
//        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
//        $news = \App\News::orderBy('id','asc')->get();
//        $brands = \App\Brand::orderBy('id','asc')->get();
//        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
//        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//        $request->validate([
//            'email' => 'required',
//        ]);
//        $pocta = new Pocta();
//
//        $pocta->email = $request->email;
//
//        $pocta->save();
//
//        return view('site.index',compact(
//            'sliderItems','newProds','ikigapdal', 'obraz', 'news', 'brands','recommendProds','warns','skidkas'
//        ))->with([
//            'categories'=>$this->categories,
//            'cartCount'=>$this->countItems($request),
//            'bottomContent'=>\App\Bottomblocks::orderBy('sort_order','asc')->get(),
//            'adblocks'=>\App\Adblocks::orderBy('sort_order','asc')->get()
//        ]);
//
//    }
//
//
//    /**
//     * @param $categoryId
//     * @param Request $request
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function getProductsByCatalog($categoryId, Request $request) {
//        $category = \App\Category::where('id',$categoryId)->first();
//        $prods = $category->products()->orderBy('id','desc')->paginate(12);
//        $childrenCategories = \App\Category::where('category_id',$categoryId)->get();
//        $recProds = \App\Product::where('status',1)->where('recommended',1)->take(5)->get();
//        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//        $colors = Color::all();
//
//        if($category->has_children) {
//
//            return view('site.product_by_cat',compact('prods','recProds','warns','colors','skidkas'))->with([
//                'categories'=>$this->categories,
//                'thisCategory'=>$category,
//                'cartCount'=>$this->countItems($request),
//                'childrenCategories'=>$childrenCategories,
//
//            ]);
//        }
//
//
//        $parentCat = \App\Category::where('id',$category->category_id)->first();
//        if($parentCat) {
//            $relatedChildrenCats = \App\Category::where('category_id',$parentCat->id)->get();
//        } else $relatedChildrenCats = null;
//
//        return view('site.product_by_subcat',compact('prods','recProds','warns','colors','skidkas'))->with([
//            'parentCat'=>$parentCat,
//            'categories'=>$this->categories,
//            'category'=>$category,
//            'cartCount'=>$this->countItems($request),
//            'relatedChildrenCats'=>$relatedChildrenCats,
//            'currentCatId'=>$categoryId,
//        ]);
//    }
//
//    public function getProductById($id, Request $request) {
//
//        $request->session()->put('currentColor', null);
//        $request->session()->put('currentSize', null);
//
//        $currentUser = \Auth::user();
//
//        $prod = \App\Product::where('id',$id)->first();
//        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(12)->get();
//        $recProds = \App\Product::orderBy('id', 'desc')->take(24)->get();
//        $newProds = \App\Product::where('new', 1)->orderBy('created_at','asc')->take(12)->get();
//        $menzes = \App\Product::orderBy('id', 'asc')->latest()->take(12)->get();
//        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//
//        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//
//        $color_product = DB::table('color_product')->select('sizes')->get();
//
//
//        $prod->img = json_decode($prod->img);
//        $countPhotos = 0;
//        foreach($prod->img as $key => $value) {
//
//            $countPhotos++;
//
//        }
//
//        $colors = $prod->colors()->get();
//
//        if(count($prod->categories) > 1) {
//            $parentCat = $prod->categories()->where('has_children',1)->first();
//            $ctgr = $prod->categories()->where('has_children',0)->first();
//        } else {
//            $ctgr = $prod->categories()->first();
//        }
//
//        return view('site.product_by_id',compact('prod','colors','countPhotos','recProds','menzes','color_product','currentUser','newProds','recommendProds','warns','skidkas'))->with([
//            'categories'=>$this->categories,
//            'cartCount'=>$this->countItems($request),
//            'ctgr'=>$ctgr,
//            'parentCat'=>isset($parentCat) ? $parentCat : null,
//        ]);
//    }
//
//    public function getSizesByColorAndProduct(Request $request,$color_id,$prod_id) {
//        $prod_id = intval($prod_id);
//        $color_id = intval($color_id);
//
//        $sizes = DB::table('color_product')->where([
//            ['product_id', '=', $prod_id],
//            ['color_id', '=', $color_id],
//        ])->get();
//
//        $request->session()->put('currentColor',$color_id);
//
//        return \Response::json([
//            'sizes'=>$sizes,
//        ]);
//    }
//
//    public function putSizeToSession(Request $request, $size) {
//        $request->session()->put('currentSize',$size);
//    }
//
//    public function rate(Request $request) {
//        \App\Rating::create($request->all());
//    }
//
//    public function review(Request $request) {
//        auth()->user()->reviews()->create($request->all());
//        return back();
//    }
//
//    public function filter(Request $request, $attr, $category, $orderDirection) {
//
//        $c = \App\Category::find($category);
//        if($attr == 'new') {
//            $prods = $c->products()->where('status',1)->orderBy('new',$orderDirection)->orderBy('created_at',$orderDirection)->get();
//        } else {
//            $prods = $c->products()->where('status',1)->orderBy('price',$orderDirection)->get();
//        }
//
//        return \Response::json([
//            'prods' => $prods,
//        ]);
//    }
//
//
//    public function getNewProds(Request $request) {
//
//        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->paginate(24);
//        $recProds = \App\Product::where('status',1)->where('recommended',1)->take(5)->get();
//        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//
//        return view('site.get_new_p', compact('recProds','newProds','warns','skidkas'))->with([
//            'categories'=>$this->categories,
//            'cartCount'=>$this->countItems($request),
//        ]);
//    }
//
//    public function getNewAjax(Request $request){
//if($request->ajax())
//     {
//      if($request->id > 0)
//      {
//       $data = \App\Product::where('new',1)->where('id', '<', $request->id)
//          ->orderBy('id', 'DESC')
//          ->limit(20)
//          ->get();
//      }
//      else
//      {
//       $data = \App\Product::where('new',1)->orderBy('id', 'DESC')
//          ->limit(20)
//          ->get();
//      }
//      $output = '';
//      $last_id = '';
//
//      if(!$data->isEmpty())
//      {
//       foreach($data as $row)
//       {
//        $output .= '
//        <a href="'. route('oneProduct',['id'=>$row->id]).'" class="card card-search">
//            <div class="card-img">
//                <img src="/images/products/smaller/' . json_decode($row->img)->main.'" alt="">
//
//                    <p class="new">Täze</p>
//
//            </div>
//            <p class="product-title">'.$row->name_tk.'</p>
//            <div class="d-flex spacebetween">
//                <h5 class="price">'.number_format($row->price,2,'.','') .'TMT</h5>
//            </div>
//        </a>';
//        $last_id = $row->id;
//       }
//       $output .= '
//       <div id="load_more">
//        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Ýene görkez</button>
//       </div>
//       ';
//      }
//      else
//      {
//       $output .= '
//       <div id="load_more">
//        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
//       </div>
//       ';
//      }
//      echo $output;
//     }
//    }
//
//    public function news( Request $request){
//
//        if(false){
//            try{
//                $nowost = News::where('id', false)->first();
//                $allnews = News::all();
//                $title = $nowost->title;
//                $description = $nowost->short_title.' Türkmen hemrasy';
//            }catch(Exception $e){
//                return abort('404');
//            }
//
//            return view('site.singleNews', compact('title', 'description', 'nowost', 'allnews'));
//        }else{
//            $title = 'Habarlar';
//            $description = 'Habarlar';
//
//            $iki_uly = News::orderBy('created_at', 'desc')->where('is_big', 1)->take(2)->get();
//            $paginator = News::orderBy('created_at', 'desc')->where('is_big', null)->paginate(6);
//            $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//            $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
//            $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
//            $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
//            $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
//            $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
//            $news = \App\News::orderBy('id','asc')->get();
//            $brands = \App\Brand::orderBy('id','asc')->get();
//            $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//            $categories = \App\Category::where('status', 1)->take(12)->get();
//
//
//            return view('site.news', compact('title', 'description', 'paginator','iki_uly','skidkas','warns','categories','warns'));
//        }
//    }
//
//
//
//    public function news_profile($id){
//
//            $news = News::findOrFail($id);
//        $paginator = News::orderBy('created_at', 'desc')->where('is_big', null)->paginate(4);
//        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
//        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
//        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
//        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
//        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
//
//        $brands = \App\Brand::orderBy('id','asc')->get();
//        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//        $categories = \App\Category::where('status', 1)->take(12)->get();
//
//            return view('site.news_detail',compact('skidkas','categories','warns','paginator'))->with([
//                'news' => $news,
//
//            ]);
//
//
//    }
//
//
//    public function sidedrawer(){
//
//        $paginator = News::orderBy('created_at', 'desc')->where('is_big', null)->paginate(4);
//        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
//        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
//        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(4)->get();
//        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
//        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
//        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
//
//        $brands = \App\Brand::orderBy('id','asc')->get();
//        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
//        $categories = \App\Category::where('status', 1)->take(12)->get();
//
//        return view('site.sidedrawer',compact('skidkas','categories','warns','paginator'));
//
//
//    }
//
//}
//
