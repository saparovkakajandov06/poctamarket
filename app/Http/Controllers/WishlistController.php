<?php

namespace App\Http\Controllers;

use App\Category;
use App\Wishlist;
//use Barryvdh\DomPDF\PDF;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class WishlistController extends Controller
{

    /*public function __construct() {
        $this->middleware(['auth']);
    }*/


    /**
     * @return \Illuminate\Http\Response
     */
    /*public function createPDF() {
        $user = Auth::user();
        $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
        view()->share('wishlists',$wishlists);
        $pdf = PDF::loadView('site.pdf', $wishlists);
        return $pdf->download('wishlist.pdf');
    }*/

    /*public function createPDF()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);

        $pdf = PDF::loadView('site.pdf', $wishlists);

        return $pdf->download('wislist.pdf');
    }*/

    public function createPDF()
    {
        $wishlists = Wishlist::all();
        view()->share('wishlists', $wishlists);
        $pdf = PDF::loadView('pdf', $wishlists);
        return $pdf->download("pdf_file.pdf");
    }

    /* public function createPDF(Request $request){
         $user = Auth::user();
         $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
         view()->share('wishlists',$wishlists);


         if($request->has('download')){
             $pdf = PDF::loadView('site.pdf',$wishlists);
             return $pdf->download('site.pdf');
         }

         return view('site.pdf');
     }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $all_products = \App\Product::all();

        $user = Auth::user();

        if ($user == null) {

            $wishlists = collect([]);
            $wishlist_cookie_ids = json_decode($_COOKIE['wishlists'], true);
            $categories = Category::where('has_children', 1)->get();

            foreach ($wishlist_cookie_ids as $wishlist_cookie_id) {
                $prod = \App\Product::where('id', $wishlist_cookie_id)->first();
                $wishlists[] = $prod;
            }


            return view('site.wishlist', compact('user', 'wishlists', 'all_products'))->with([
                'wishlists' => $wishlists,
                'categories' => $categories,
                'currentUser' => \Auth::user()
            ]);

        }

        $categories = Category::where('has_children', 1)->get();
        $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);

        return view('site.wishlist', compact('user', 'wishlists'))->with([
            'categories' => $categories,
            'currentUser' => \Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {

        $this->validate($request, array(
            'user_id'=>'required',
            'product_id' =>'required',
        ));

        $wishlist = new Wishlist;

        $wishlist->user_id = $request->user_id;
        $wishlist->product_id = $request->product_id;


        $wishlist->save();

        return redirect()->back()->with('flash_message',
            'Haryt, '. $wishlist->product->name_tk.' Halanlarymya goşuldy.');
    }*/


    public function store(Request $request)
    {

        //if user not registered
        //then save to cookie
        if ($request->user_id == null) {

            $wishlist_cookie_ids = json_decode($_COOKIE['wishlists'], true);

            //remove liked order from cookie if has
            foreach ($wishlist_cookie_ids as $wishlist_cookie_id)
                if ($wishlist_cookie_id == $request->product_id) {
                    unset($wishlist_cookie_ids[array_search($request->product_id, $wishlist_cookie_ids)]);
                    setcookie('wishlists', json_encode($wishlist_cookie_ids));
                    return redirect()->back()->with('flash_messaged', 'This item is already in your wishlist!');
                }

            $wishlist_cookie_ids[] = $request->product_id;
            setcookie('wishlists', json_encode($wishlist_cookie_ids));

            return redirect()->back()->with('flash_message', 'Item Added to your wishlist.');
        }

        $this->validate($request, array(
            'user_id' => 'required',
            'product_id' => 'required',
        ));

        $status = Wishlist::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        if (isset($status->user_id) and isset($request->product_id)) {
            return redirect()->back()->with('flash_messaged', 'This item is already in your
       wishlist!');
        } else {
            $wishlist = new Wishlist;

            $wishlist->user_id = $request->user_id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();

            return redirect()->back()->with('flash_message',
                'Item, ' . $wishlist->product->title . ' Added to your wishlist.');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //if user not registered remove from cookie
        if (!Auth::user()) {
            $wishlist_cookie_ids = json_decode($_COOKIE['wishlists'], true);
            unset($wishlist_cookie_ids[array_search($id, $wishlist_cookie_ids)]);
            setcookie('wishlists', json_encode($wishlist_cookie_ids));

            return redirect()->back()
                ->with('flash_message', 'Aýryldy');
        }

        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->back()
            ->with('flash_message', 'Aýryldy');
    }
}
