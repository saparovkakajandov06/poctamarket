<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Config;

class SkidkaController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin') {
            $old = \App\Skidka::all();
            return view('admin.skidka')->with([
                'old'=> $old,
                'page_title'=>'Skidka'
            ]);
        } else abort(403);

    }



    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $old = \App\Skidka::where('id',$id)->first();

            if($request->isMethod('delete')) {
                try {
                    \File::delete(public_path().'/images/slider/'.$old->image);
                    \File::delete(public_path().'/images/slider/'.$old->image);
                    $old->delete();
                    return redirect()->route('admin_skidka')->with('status','Скидка удаленa');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                }
            }

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'name'=>'required',
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $input = array();

                    $input['name'] = $result['name'];


                    if($request->hasFile('img')) {
                        $file = $request->file('img');
                        $hardPath = Str::random(100);

                        Image::make($file)
                            ->save(public_path().'/img/'.$hardPath.'.'.$file->getClientOriginalExtension());

                        app(Filesystem::class)->delete(public_path($old->img));

                        $input['img'] = 'img/' . $hardPath . '.' . $file->getClientOriginalExtension();
                    } else {
                        $input['img'] = $old->img;
                    }

                    $old->fill($input);
                    $old->update();

                    return redirect()->route('admin_skidka')->with('status','Инофрмация в рекламных блоках');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_skidka')->with([
                'page_title' => 'Редактировать данные',
                'old' => $old,
            ]);

        } else {
            abort(403);
        }
    }




    public function add(Request $request) {
        if(auth()->user()->role == 'admin') {
            if($request->isMethod('post')){
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'img'=>'required',
                        'name'=>'required',
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $file = $request->file('img');

                    $hardPath = $request->get('name').'-'.Str::random(40);
                    Image::make($file)
//                        ->resize(Config::get('mysetting.slider_w'), Config::get('mysetting.slider_h'))
                        ->save(public_path().'/images/slider/'.$hardPath.'.'.$file->getClientOriginalExtension());

                    $brand = new \App\Skidka([
                        'name' => $result['name'],
//                        'is_shown' => (isset($result['is_shown'])) ? 1 : 0,
                        'img' => 'images/slider/' . $hardPath.'.'.$file->getClientOriginalExtension(),

                    ]);

                    $brand->save();

                    return redirect()->route('admin_skidka')->with('status','Скидка добавлен');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_skidka')->with([
                'page_title'=>'Новый скидка',
            ]);
        } else {
            abort(403);
        }
    }

}
