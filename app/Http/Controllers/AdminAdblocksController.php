<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Config;

class AdminAdblocksController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin') {
            return view('admin.adblocks')->with([
                'adblocks'=>\App\Adblocks::all(),
                'page_title'=>'Рекламные блоки'
            ]);
        } else abort(403);
        
    }

    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $old = \App\Adblocks::where('id',$id)->first();

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'link'=>'required',
                    ]);
                    
                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $input = array();

                    $input['link'] = $result['link'];
                    $input['title'] = $result['title'];
                    $input['sort_order'] = $result['sort_order'];

                    if($request->hasFile('img')) {
                        $file = $request->file('img');
                        $hardPath = Str::random(100);

                        Image::make($file)
                            ->resize(Config::get('mysetting.adblock_w'), Config::get('mysetting.adblock_h'))
                            ->save(public_path().'/img/'.$hardPath.'.'.$file->getClientOriginalExtension());
                        
                        app(Filesystem::class)->delete(public_path($old->img));
                        
                        $input['img'] = 'img/' . $hardPath . '.' . $file->getClientOriginalExtension();
                    } else {
                        $input['img'] = $old->img;
                    }

                    $old->fill($input);
                    $old->update();

                    return redirect()->route('admin_adblocks')->with('status','Инофрмация в рекламных блоках');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_adblocks')->with([
                'page_title' => 'Редактировать данные',
                'old' => $old,
            ]);

        } else {
            abort(403);
        }
    }
}
