<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Config;
use App\Skidka;
use App\Warn_Skidka;

class BrandController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin') {
            $old = \App\Brand::all();
            return view('admin.brand')->with([
                'old'=> $old,
                'page_title'=>'Бренды'
            ]);
        } else abort(403);

    }

    public function show() {
        $sliderItems = \App\Slider::where('is_shown',1)->orderBy('sort_order','asc')->get();
        $newProds = \App\Product::where('new',1)->orderBy('id','asc')->take(3)->get();
        $recommendProds = \App\Product::where('recommended',1)->orderBy('id','desc')->take(8)->get();
        $ikigapdal = \App\IkiGapdalSurat::where('is_shown',1)->orderBy('created_at','desc')->take(2)->get();
        $obraz = \App\Obraz::where('is_shown',1)->take(8)->latest()->get();
        $news = \App\News::orderBy('id','asc')->get();
        $warns = Warn_Skidka::orderBy('created_at','desc')->take(1)->get();
        $skidkas = Skidka::orderBy('created_at','desc')->take(1)->get();
            $brand = \App\Brand::all();
            $categories = \App\Category::where('status', 1)->take(12)->get();
            return view('site.brand',compact('skidkas','sliderItems','news','newProds','recommendProds','ikigapdal','obraz','warns'))->with([
                'brand'=> $brand,
                'categories' => $categories,
                'page_title'=>'Бренды',

            ]);


    }


    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin') {

            $old = \App\Brand::where('id',$id)->first();

            if($request->isMethod('delete')) {
                try {
                    \File::delete(public_path().'/images/slider/'.$old->image);
                    \File::delete(public_path().'/images/slider/'.$old->image);
                    $old->delete();
                    return redirect()->route('admin_brand')->with('status','Бренд удаленa');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                }
            }

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'title'=>'required',
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $input = array();

                    $input['title'] = $result['title'];


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

                    return redirect()->route('admin_brand')->with('status','Инофрмация в рекламных блоках');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_brand')->with([
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
                        'title'=>'required',
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $file = $request->file('img');

                    $hardPath = $request->get('title').'-'.Str::random(40);
                    Image::make($file)
//                        ->resize(Config::get('mysetting.slider_w'), Config::get('mysetting.slider_h'))
                        ->save(public_path().'/images/slider/'.$hardPath.'.'.$file->getClientOriginalExtension());

                    $brand = new \App\Brand([
                        'title' => $result['title'],
                        'is_shown' => (isset($result['is_shown'])) ? 1 : 0,
                        'img' => 'images/slider/' . $hardPath.'.'.$file->getClientOriginalExtension(),

                    ]);

                    $brand->save();

                    return redirect()->route('admin_brand')->with('status','Образ добавлен');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_brand')->with([
                'page_title'=>'Новый бренд',
            ]);
        } else {
            abort(403);
        }
    }

}
