<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Config;

class AdminSliderController extends Controller
{
    public function index() {
         if(auth()->user()->role == 'admin') {
            return view('admin.slider')->with(
                [
                    'slides'=>\App\Slider::all(),
                    'page_title'=>'Слайдер'
                ]
            );
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
                            ->resize(Config::get('mysetting.slider_w'), Config::get('mysetting.slider_h'))
                            ->save(public_path().'/images/slider/'.$hardPath.'.'.$file->getClientOriginalExtension());

                    $slider = new \App\Slider([
                        'title' => $result['title'],
                        'description' => $result['description'],
                        'url' => $result['url'],
                        'is_shown' => (isset($result['is_shown'])) ? 1 : 0,
                        'img' => 'images/slider/' . $hardPath.'.'.$file->getClientOriginalExtension(),
                        'sort_order' => (isset($result['sort_order'])) ? $result['sort_order'] : 0,
                        'slider_id' => $result['slider_id']
                    ]);

                    $slider->save();

                    return redirect()->route('admin_slider')->with('status','Слайд добавлен');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_slide')->with([
                'page_title'=>'Новый слайд',
            ]);
        } else {
            abort(403);
        }
    }

    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $old = \App\Slider::where('id',$id)->first();

            if($request->isMethod('delete')) {
                try {
                    app(Filesystem::class)->delete(public_path($old->img));
                    $old->delete();
                    return redirect()->route('admin_slider')->with('status','Cлайд удален');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                }
            }

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();

                    $input = array();

                    $input['is_shown'] = (isset($result['is_shown'])) ? intval($result['is_shown']) : 0;
                    $input['sort_order'] = $result['sort_order'];
                    $input['slider_id'] = intval($result['slider_id']);
                    $input['description'] = $result['description'];
                    $input['title'] = $result['title'];
                    $input['url'] = $result['url'];

                    if($request->hasFile('img')) {
                        $file = $request->file('img');
                        
                        app(Filesystem::class)->delete(public_path($old->img));
                        
                        $hardPath = $request->get('title').'-'.Str::random(40);
                        
                        Image::make($file)
                            ->resize(Config::get('mysetting.slider_w'), Config::get('mysetting.slider_h'))
                            ->save(public_path().'/images/slider/'.$hardPath.'.'.$file->getClientOriginalExtension());

                        $input['img'] = 'images/slider/' . $hardPath.'.'.$file->getClientOriginalExtension();
                    } else {
                        $input['img'] = $old->img;
                    }

                    $old->fill($input);
                    $old->update();

                    return redirect()->route('admin_slider')->with('status','Инофрмация о слайде обновлена');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_slider')->with([
                'page_title' => 'Редактировать данные',
                'old' => $old,
            ]);

        } else {
            abort(403);
        }
    }
}
