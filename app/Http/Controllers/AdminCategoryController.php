<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class AdminCategoryController extends SiteController
{
    public function index() {
         if(auth()->user()->role == 'admin') {
            return view('admin.categories')->with(
                [
                    'categories'=>$this->categories,
                    'page_title'=>'Категории'
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
                        'name_tk'=>'required',
                    ]);
                    
                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $has_children = 0;

                    foreach($result['subcatname'] as $scn) {
                        if($scn != null) {
                            $has_children = 1;
                            break;
                        }
                    }

                    $category = new \App\Category([
                        'name_tk' => $result['name_tk'],
                        'status' => (isset($result['status'])) ? 1 : 0,
                        'has_children'=>$has_children
                    ]);

                    $category->save();

                    foreach($result['subcatname'] as $key => $val) {
                        if($val != null) {
                            $c = new \App\Category([
                                'name_tk' => $val,
                                'status' => (isset($result['subcatstatus'][$key])) ? 1 : 0,
                                'has_children'=>0,
                                'category_id'=>$category->id
                            ]);
                            $c->save();
                        }
                    }

                    return redirect()->route('admin_categories')->with('status','Категория добавлена');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_category')->with([
                'page_title'=>'Новая категория',
            ]);
        } else {
            abort(403);
        }
    }

    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $old = \App\Category::where('id',$id)->first();
            $parent = (\App\Category::where('id',$old->category_id)->first()) ? \App\Category::where('id',$old->category_id)->first() : null;

            // if($request->isMethod('delete')) {
                // try {
                //     if($old->has_children) {
                //         $old->products()->detach();
                //         $children = \App\Category::where('category_id',$old->id)->get();
                //         foreach($children as $c) {
                //             $c->products()->detach();
                //             $c->delete();
                //         }
                //         $old->delete();
                //     } else {
                //         // $old->delete();
                //     }
                //     // $old->categories()->detach();
                //     // $old->colors()->detach();
                //     // $old->reviews()->delete();
                //     // $old->ratings()->delete();
                    
                //     return redirect()->route('admin_categories')->with('status','Категория удаленa');
                // }
                // catch(Exception $e) {
                //     return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                // }
            // }

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'name_tk'=>'required',
                    ]);
                    
                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $input = array();

                    $input['name_tk'] = $result['name_tk'];
                    $input['status'] = (isset($result['status'])) ? intval($result['status']) : 0;

                    $old->fill($input);
                    $old->update();

                    if($old->has_children && !$input['status']) {
                        \App\Category::where('category_id',$old->id)
                            ->update(['status'=>$input['status']]);
                    }

                    foreach($result['subcatname'] as $key => $val) {
                        if($val != null) {
                            $c = new \App\Category([
                                'name_tk' => $val,
                                'status' => (isset($result['subcatstatus'][$key])) ? 1 : 0,
                                'has_children'=>0,
                                'category_id'=>$old->id
                            ]);
                            $c->save();
                        }
                    }

                    return redirect()->route('admin_categories')->with('status','Инофрмация о категории обновлена');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_category')->with([
                'page_title' => 'Редактировать данные',
                'old' => $old,
                'parent'=>$parent,
            ]);

        } else {
            abort(403);
        }
    }
}
