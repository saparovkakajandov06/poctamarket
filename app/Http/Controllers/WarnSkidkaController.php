<?php

namespace App\Http\Controllers;

use App\Category;
use App\Warn_Skidka;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Validator;

class WarnSkidkaController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            return view('admin.warns')->with(
                [
                    'warns'=> \App\Warn_Skidka::orderBy('id','asc')->get(),
                    'page_title'=>'Popup для скидков'
                ]
            );
        }
        abort('403');
    }

    public function add(Request $request) {
        if(auth()->user()->role == 'admin') {

            $categories = Category::all();

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
//
//                    $categories = Category::all();

                    $file = $request->file('img');

                    $hardPath = $request->get('prosent').'-'.Str::random(40);
                    Image::make($file)
                        ->resize(Config::get('mysetting.slider_w'), Config::get('mysetting.slider_h'))
                        ->save(public_path().'/images/slider/'.$hardPath.'.'.$file->getClientOriginalExtension());

                    $warns = new \App\Warn_Skidka([
                        'prosent' => $result['prosent'],
                        'img' => 'images/slider/' . $hardPath.'.'.$file->getClientOriginalExtension(),
                        'category_id' => $result['category_id']
                    ]);

                    $warns->save();

                    return redirect()->route('admin_warns')->with('status','Popup добавлен');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_warn')->with([
                'page_title'=>'Новый Popup',
                'categories' => $categories,
            ]);
        } else {
            abort(403);
        }
    }



    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $old = \App\Warn_Skidka::where('id',$id)->first();
            $categories = Category::all();

            if($request->isMethod('delete')) {
                try {
                    app(Filesystem::class)->delete(public_path($old->img));
                    $old->delete();
                    return redirect()->route('admin_warns')->with('status','Popup удален');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                }
            }

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();

                    $input = array();

                    $input['category_id'] = intval($result['category_id']);
                    $input['prosent'] = $result['prosent'];



                    if($request->hasFile('img')) {
                        $file = $request->file('img');

                        app(Filesystem::class)->delete(public_path($old->img));

                        $hardPath = $request->get('prosent').'-'.Str::random(40);

                        Image::make($file)
                            ->resize(Config::get('mysetting.slider_w'), Config::get('mysetting.slider_h'))
                            ->save(public_path().'/images/slider/'.$hardPath.'.'.$file->getClientOriginalExtension());

                        $input['img'] = 'images/slider/' . $hardPath.'.'.$file->getClientOriginalExtension();
                    } else {
                        $input['img'] = $old->img;
                    }

                    $old->fill($input);
                    $old->update();

                    return redirect()->route('admin_warns')->with('status','Инофрмация о Popup обновлена');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_warns')->with([
                'page_title' => 'Редактировать данные',
                'old' => $old,
                'categories' => $categories,
            ]);

        } else {
            abort(403);
        }
    }




  /*public function create(){
        if(auth()->user()->role == 'admin') {
            $warns = Warn_Skidka::all();
            $categories = Category::all();
            return view('admin.add_warn', compact('warns', 'categories'))->with([
                'page_title'=>'Popup для скидков'
            ]);
        }
    }



    public function store(Request $request){
        if(auth()->user()->role == 'admin') {

            $result = $request->all();

            $file = $request->file('img');

//            $hardPath = $request->get('prosent').'-'.Str::random(40);
//            Image::make($file)
//                ->save(public_path().'/images/slider/'.$hardPath.'.'.$file->getClientOriginalExtension());

            if ($request->hasfile('img')) {
                $file_full_name = $request->file('img')->getClientOriginalName();
                $filename = pathinfo($file_full_name, PATHINFO_FILENAME);
                $ext = $ext = pathinfo($file_full_name, PATHINFO_EXTENSION);
                $file = $request->file('img');
                $file->storeAs('/images/slider/', $filename . '.' . $ext);
            }

            $warn = new \App\Warn_Skidka([
                'category_id' => $result['category_id'],
                'prosent' => $result['prosent'],
                'img' => 'images/slider/' . $file_full_name.'.'.$file->getClientOriginalExtension(),

            ]);

            $warn->save();

            return redirect()->route('admin_warns')->with('status','Popup добавлен');


        }
    }*/


 /*   public function edit($id,Request $request)
    {
        if(auth()->user()->role == 'admin'){
            $warns = \App\Warn_Skidka::where('id', $id)->first();
            $category = \App\Category::all();
            $page_title = 'Редактировать Popup';

            if($request->isMethod('delete')) {
                try {
                    \File::delete(public_path().'/images/slider/'.$warns->img);
                    $warns->delete();
                    return redirect()->route('admin_warns')->with('status','Popup удаленa');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                }
            }

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();
                    $validator = Validator::make($result,[
                        'prosent'   => 'required|string|max:3',

                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    if ($request->hasfile('img')) {
                        $file_full_name = $request->file('img')->getClientOriginalName();
                        $filename = pathinfo($file_full_name, PATHINFO_FILENAME);
                        $ext = $ext = pathinfo($file_full_name, PATHINFO_EXTENSION);
                        $file = $request->file('img');
                        $file->storeAs('/images/slider/', $filename . '.' . $ext);
                    }

                    $path = '/images/slider' . $filename . '.' . $ext;;
                    $result['img'] = $path;

                    $warns->prosent = $request->get('prosent');
                    $warns->category_id  = $request->get('category_id');
                    $warns->save();

                    return redirect()->route('admin_warns')->with('status','Инофрмация о Popup обновлена');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_warns', compact('warns', 'page_title','category'));
        }
        abort('403');
    }*/

}
