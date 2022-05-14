<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $categories;
    protected $prods;
    protected $title;

    public function __construct(Request $request) {
        $this->categories = \App\Category::whereNull('category_id')
            ->with('childrenCategories')
            ->get();
    }

    public static function countItems(Request $request) {
        $p = $request->session()->get('products','default');
        if($p != 'default') {
            $count = 0;
            foreach($p as $pr) {
                $count = $count + $pr['amount'];
            }
            session(['cartCount' => $count]);
            return $count;
        } else {
            session(['cartCount' => 0]);
            return 0;
        }
    }
}
