<?php

namespace App\Http\Controllers;

use App\Gift;
use App\Skidka;
use App\Warn_Skidka;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Config;

class GiftController extends Controller
{
    public function index() {
    if(auth()->user()->role == 'admin') {
        $gift = \App\Gift::all();
        return view('admin.gift')->with([
            'gift'=> $gift,
            'page_title'=>'Подарки'
        ]);
    } else abort(403);

}


public function add(){
        $gift = Gift::all();
    $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
    $categories = \App\Category::where('status', 1)->take(12)->get();
    $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
        return view('site.add_gift', compact('warns', 'categories','skidkas'))->with([
           'gift' => $gift,
        ]);
}

    public function store(Request $request) {
            if($request->isMethod('post')){
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'username'=>'required',
                        'name'=>'required',
                        'surname'=>'required',
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }


                    $gift = new \App\Gift([
                        'username' => $result['username'],
                        'name' => $result['name'],
                        'surname' => $result['surname'],
                        'email' => $result['email'],
                        'phone' => $result['phone'],
                        'sebap' => $result['sebap'],
                        'hyper' => $result['hyper'],
                        'message' => $result['message'],
                        'send' => (isset($result['send'])) ? 1 : 0,
                    ]);

                    $gift->save();

                    return redirect()->route('podarka')->with('status','Подарка отправлен');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка отправление: ' . $e->getMessage());
                }
            }

            /*return view('site.add_gift')->with([
                'page_title'=>'Отправить подарки',
            ]);*/

    }

}
