<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Config;


class IkiGapdalSuratController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin') {
            $old = \App\IkiGapdalSurat::all();
            return view('admin.addikigapdal')->with([
                'old'=> $old,
                'page_title' => 'Iki gapdal blok',
            ]);
        } else abort(403);

    }


    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $old = \App\IkiGapdalSurat::where('id',$id)->first();

            if($request->isMethod('delete')) {
                try {
                    \File::delete(public_path().'/images/slider/'.$old->image);
                    \File::delete(public_path().'/images/slider/'.$old->image);
                    $old->delete();
                    return redirect()->route('admin_ikigapdal')->with('status','Блок удаленa');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                }
            }

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
                            ->save(public_path().'/img/'.$hardPath.'.'.$file->getClientOriginalExtension());

                        app(Filesystem::class)->delete(public_path($old->img));

                        $input['img'] = 'img/' . $hardPath . '.' . $file->getClientOriginalExtension();
                    } else {
                        $input['img'] = $old->img;
                    }

                    $old->fill($input);
                    $old->update();

                    return redirect()->route('admin_ikigapdal')->with('status','Инофрмация в рекламных блоках');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_ikigapdal')->with([
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
                    // dd(new \App\Slider);

                    $validator = Validator::make($result,[
                        'img'=>'required',
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $file = $request->file('img');

                    $hardPath = $request->get('title').'-'.Str::random(40);
                    Image::make($file)
//                        ->resize(Config::get('mysetting.slider_w'), Config::get('mysetting.slider_h'))
                        ->save(public_path().'/images/slider/'.$hardPath.'.'.$file->getClientOriginalExtension());

                    $ikigapdal = new \App\IkiGapdalSurat([
                        'title' => $result['title'],
                        'link' => $result['link'],
                        'is_shown' => (isset($result['is_shown'])) ? 1 : 0,
                        'img' => 'images/slider/' . $hardPath.'.'.$file->getClientOriginalExtension(),
                        'sort_order' => (isset($result['sort_order'])) ? $result['sort_order'] : 0,
                    ]);

                    $ikigapdal->save();

                    return redirect()->route('admin_ikigapdal')->with('status','Слайд добавлен');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_ikigapdal')->with([
                'page_title'=>'Новый слайд',
            ]);
        } else {
            abort(403);
        }
    }


}
