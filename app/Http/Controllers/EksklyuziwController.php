<?php

namespace App\Http\Controllers;

use App\Eksklyuziw;
use App\Product;
use Illuminate\Http\Request;

class EksklyuziwController extends Controller
{
    public function index(){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
            $eksklyuziw = Eksklyuziw::all();
            $product = Product::all();
            return view('admin.eksklyuziw')->with([
                'page_title'=>'Отзывы и вопросы',
                'eksklyuziw' => $eksklyuziw,
                'product' => $product,
            ]);
        }
    }

    public function store(Request $request){



        $eksklyuziw = new Eksklyuziw();

        $eksklyuziw->product_id = $request->product;
        $eksklyuziw->paymenttype = intval($request->input('paymenttype'));
        $eksklyuziw->email = $request->email;
        $eksklyuziw->phone = $request->phone;

        $eksklyuziw->save();

        return back()->with('status','Отправлен');
    }



    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $eksklyuziw = \App\Eksklyuziw::where('id', $id)->first();

            if ($request->isMethod('delete')) {
                try {

                    $eksklyuziw->delete();
                    return redirect()->route('admin_eksklyuziw')->with('status', 'Удалена');
                } catch (Exception $e) {
                    return redirect()->back()->with('error', 'Ошибка удаления: ' . $e->getMessage());
                }
            }

        }
    }
}
