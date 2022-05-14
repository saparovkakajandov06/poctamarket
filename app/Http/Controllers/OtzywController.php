<?php

namespace App\Http\Controllers;

use App\Otzyw;
use App\Product;
use Illuminate\Http\Request;

class OtzywController extends Controller
{


    public function index(){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
            $otzyw = Otzyw::all();
            $product = Product::all();
            return view('admin.otzyw')->with([
                'page_title'=>'Отзывы и вопросы',
                'otzyw' => $otzyw,
                'product' => $product,
            ]);
        }
    }

    public function store(Request $request){

        $currentUser = \Auth::user();

        if($currentUser == null) {
            $request->validate([
                'user_name'=>'required',
                'user_surname'=>'required',
                'email'=>'required',
                'user_phone'=>'required|min:8',
                'otzyw' => 'required|min:3',
            ]);
        }

        else {
            $request->validate([
                'otzyw' => 'required|min:3',
            ]);
        }



        $otzyw = new Otzyw();

        if($currentUser)

        {
            $otzyw->user_id = $currentUser->id;
        }

        else {
            $otzyw->user_name = $request->input('user_name');
            $otzyw->user_surname = $request->input('user_surname');


            $otzyw->email = $request->input('email');
            $otzyw->user_phone = $request->input('user_phone');
        }

        $otzyw->product_id = $request->product;
        $otzyw->otzyw = $request->otzyw;

        $otzyw->online_payment = intval($request->input('online_payment'));

        $otzyw->save();

        return back()->with('status','Отзыв и вопрос отправлен');
    }



    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $otzyw = \App\Otzyw::where('id', $id)->first();

            if ($request->isMethod('delete')) {
                try {

                    $otzyw->delete();
                    return redirect()->route('admin_otzyw')->with('status', 'Отзыв и вопрос удален');
                } catch (Exception $e) {
                    return redirect()->back()->with('error', 'Ошибка удаления: ' . $e->getMessage());
                }
            }

        }
    }
}
