<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AdminColorController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin') {
            return view('admin.colors')->with(
                [
                    'colors'=>\App\Color::all(),
                    'page_title'=>'Цвета'
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

                    $validator = Validator::make($result,[
                        'color_tk'=>'required',
                    ]);
                    
                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $color = new \App\Color([
                        'color_tk' => $result['color_tk'],
                        'color' => $result['color'],
                    ]);

                    $color->save();

                    return redirect()->route('admin_colors')->with('status','Цвет добавлен');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_color')->with([
                'page_title'=>'Новый цвет',
            ]);
        } else {
            abort(403);
        }
    }

    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $old = \App\Color::where('id',$id)->first();

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'color_tk'=>'required',
                    ]);
                    
                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $input = array();

                    $input['color_tk'] = $result['color_tk'];
                    $input['color'] = $result['color'];

                    $old->fill($input);
                    $old->update();

                    return redirect()->route('admin_colors')->with('status','Инофрмация о цвете обновлена');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_colors')->with([
                'page_title' => 'Редактировать данные',
                'old' => $old,
            ]);

        } else {
            abort(403);
        }
    }
}
