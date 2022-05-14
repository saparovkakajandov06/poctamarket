<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;

class AdminController extends Controller
{
    public function index() {
        $page_title = 'Админпанель';

        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dispatcher' || auth()->user()->role == 'product_manager') {
            
            return view('admin.index',compact('page_title'))->with([
                'cntProds' => DB::table('products')->count(),
                'cntCategories' => DB::table('categories')->count(),
                'cntColors' => DB::table('colors')->count(),
                'cntSlides' => DB::table('slider')->count(),
                'orderYearCount' => Order::whereYear('created_at', date('Y'))->count(),
                'sumYearOrder' => Order::whereYear('created_at', date('Y'))->sum('total_price'),
            ]);
        } else {
            abort(403);
        }
    }
}
