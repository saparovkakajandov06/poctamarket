<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Validator;
use Exception;
use Config;

class AdminNewsController extends SiteController
{
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            return view('admin.news')->with(
                [
                    'news'=> \App\News::orderBy('id','asc')->get(),
                    'page_title'=>'Новости'
                ]
            );
        }
        abort('403');
    }

    public function add(Request $request)
    {
        if(auth()->user()->role == 'admin'){
            if($request->isMethod('post')) {
                try {
                    $result = $request->all();
                    $validator = Validator::make($result,[
                        'short_title'   => 'required|string|max:100', 
                        'title'         => 'required|string|max:255', 
                        'image'         => 'required', 
                        'news_body'     => 'required|string'
                    ]);
                    
                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                    
                    $hardPath = '';

                    if($request->file('image')){
                        $hardPath = $request->get('short_title').'-'.Str::random(40);
                        Image::make($request->file('image'))
                            ->resize(Config::get('mysetting.news_big_image_w'), Config::get('mysetting.news_big_image_h'))
                            ->save(public_path().'/images/my_news/big/'.$hardPath.'.'.$request->file('image')->getClientOriginalExtension());
                        Image::make($request->file('image'))
                            ->resize(Config::get('mysetting.news_image_w'), Config::get('mysetting.news_image_h'))
                            ->save(public_path().'/images/my_news/little/'.$hardPath.'.'.$request->file('image')->getClientOriginalExtension());
                    }

                    $freshNews = new \App\News([
                        'image' => $hardPath.'.'.$request->file('image')->getClientOriginalExtension(),
                        'short_title' => $result['short_title'],
                        'is_big' => (isset($result['is_big'])) ? $result['is_big'] : 0 || 1,
                        'title' => $result['title'],
                        'news_body' => $result['news_body'],
                    ]);

                    $freshNews->save();

                    return redirect()->route('admin_news')->with('status','Новость добавлена');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }
            return view('admin.add_news')->with(
                [
                    'page_title'=>'Добавить новость'
                ]
            );
        }
        abort('403');
    }

    public function edit($id,Request $request)
    {
        if(auth()->user()->role == 'admin'){
            $wantednews = \App\News::where('id', $id)->first();
            $page_title = 'Редактировать новость';

            if($request->isMethod('delete')) {
                try {
                    \File::delete(public_path().'/images/my_news/little/'.$wantednews->image);
                    \File::delete(public_path().'/images/my_news/big/'.$wantednews->image);
                    $wantednews->delete();
                    return redirect()->route('admin_news')->with('status','Новость удаленa');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                }
            }

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();
                    $validator = Validator::make($result,[
                        'short_title'   => 'required|string|max:100', 
                        'title'         => 'required|string|max:255', 
                        'news_body'     => 'required|string'
                    ]);
                    
                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    if($request->file('image')) {
                        \File::delete(public_path().'/images/my_news/little/'.$wantednews->image);
                        \File::delete(public_path().'/images/my_news/big/'.$wantednews->image);
                        $hardPath = $request->get('short_title').'-'.Str::random(40);
                        Image::make($request->file('image'))
                            ->resize(Config::get('mysetting.news_big_image_w'), Config::get('mysetting.news_big_image_h'))
                            ->save(public_path().'/images/my_news/big/'.$hardPath.'.'.$request->file('image')->getClientOriginalExtension());
                        Image::make($request->file('image'))
                                ->resize(Config::get('mysetting.news_image_w'), Config::get('mysetting.news_image_h'))
                                ->save(public_path().'/images/my_news/little/'.$hardPath.'.'.$request->file('image')->getClientOriginalExtension());
            
                        $wantednews->image = $hardPath.'.'.$request->file('image')->getClientOriginalExtension();
                    }
                    $wantednews->short_title = $request->get('short_title');
                    $wantednews->title       = $request->get('title');
                    $wantednews->news_body   = $request->get('news_body');
                    $wantednews->save();

                    return redirect()->route('admin_news')->with('status','Инофрмация о новости обновлена');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }

            return view('admin.edit_news', compact('wantednews', 'page_title'));
        }
        abort('403');
    }
}
