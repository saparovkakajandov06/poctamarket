<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\False_;
use Validator;
use Config;
use DB;

class AdminProductController extends SiteController
{
    public function index() {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
            $products = \App\Product::paginate(10);
            return view('admin.products')->with(
                [
                    'products'=> $products,
                    'page_title'=>'Товары',
                ]
            );
        } else {
            abort(403);
        }
    }

    public function add(Request $request) {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
            if($request->isMethod('post')){
                try {
                    $result = $request->all();

                    $validator = Validator::make($result,[
                        'name_tk'=>'required',
                        'code'=>'required',
                        'price'=>'required',
                        'main_img'=>'required'
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $category = \App\Category::find($result['category_id']);

                    $imgsArr = array();

                    if($request->hasFile('main_img')) {
                        $file = $request->file('main_img');

                        $hardPath = Str::random(100);

                        Image::make($request->file('main_img'))
                            ->resize(Config::get('mysetting.product_admin_w'), Config::get('mysetting.product_admin_h'))
                            ->save(public_path().'/images/products/admin/'.$hardPath.'.'.$file->getClientOriginalExtension());
                        Image::make($request->file('main_img'))
                            ->resize(Config::get('mysetting.product_main_w'), Config::get('mysetting.product_main_h'))
                            ->save(public_path().'/images/products/big/'.$hardPath.'.'.$file->getClientOriginalExtension());
                        Image::make($request->file('main_img'))
                            ->resize(Config::get('mysetting.product_little_w'), Config::get('mysetting.product_little_h'))
                            ->save(public_path().'/images/products/little/'.$hardPath.'.'.$file->getClientOriginalExtension());
                        Image::make($request->file('main_img'))
                            ->resize(Config::get('mysetting.product_main_med_w'), Config::get('mysetting.product_main_med_h'))
                            ->save(public_path().'/images/products/smaller/'.$hardPath.'.'.$file->getClientOriginalExtension());

                        $imgsArr['main'] = $hardPath . '.' . $file->getClientOriginalExtension();
                    }

                    if ($request->hasFile('other_imgs')) {
                        foreach($request->file('other_imgs') as $key => $image){
                            $hardPath = Str::random(100);

                            Image::make($image)
                                ->resize(Config::get('mysetting.product_main_w'), Config::get('mysetting.product_main_h'))
                                ->save(public_path().'/images/products/big/'.$hardPath.'.'.$image->getClientOriginalExtension());
                            Image::make($image)
                                ->resize(Config::get('mysetting.product_little_w'), Config::get('mysetting.product_little_h'))
                                ->save(public_path().'/images/products/little/'.$hardPath.'.'.$image->getClientOriginalExtension());

                            $imgsArr[$key] = $hardPath . '.' . $image->getClientOriginalExtension();
                        }
                    }

                    $product = new \App\Product([
                        'name_tk' => $result['name_tk'],
                        'name_ru' => $result['name_ru'],
                        'name_en' => $result['name_en'],
                        'code' => $result['code'],
                        'price' => (float) $result['price'],
                        'img' => json_encode((object) $imgsArr, JSON_UNESCAPED_SLASHES),
                        'brand' => $result['brand'],
                        'description_tk' => $result['description_tk'],
                        'availability' => (isset($result['availability'])) ? intval($result['availability']) : 0,
                        'new' => (isset($result['new'])) ? intval($result['new']) : 0,
                        'recommended' => (isset($result['recommended'])) ? intval($result['recommended']) : 0,
                        'status' => (isset($result['status'])) ? intval($result['status']) : 0,

                    ]);

                    $category->products()->save($product);

                    $earlier = 0; //id родительской категории предыдущей выбранной категории
                    //на тот случай, если родитель текущей дополнительной категории
                    //совпадает с родителем предыдущей дополнительной категории
                    $earlierMainId = $category->id; //id текущей выбранной категории
                    //на тот случай, если выбирают одну и ту же категорию несколько раз

                    if($category->category_id) {
                        $product->categories()->attach($category->category_id);

                        $earlier = $category->category_id;
                    }

                    foreach($result['additionalcat'] as $key => $val) {
                        if($val != null && $earlierMainId != intval($val)) {
                            $c = \App\Category::find($val);
                            $c->products()->save($product);
                            if($c->category_id && $c->category_id != $earlier) {

                                $product->categories()->attach($c->category_id);

                                $earlier = $c->category_id;
                            }

                            $earlierMainId = intval($val);
                        }
                    }

                    if(array_key_exists ('colors' , $result )) {
                        $this->addColorsAndSizes($result,$product);
                    }

                    return redirect()->route('admin_products')->with('status','Товар добавлен');
                }

                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
                }
            }

            return view('admin.add_product')->with([
                'page_title'=>'Новый товар',
                'colors'=> \App\Color::all(),
                'categories'=>$this->categories,
            ]);
        } else {
            abort(403);
        }
    }

    public function addColorsAndSizes($result,$product) {
        foreach($result['colors'] as $color) {
            $product->colors()->attach($color);

            $arr = array();

            foreach($result[$color] as $size) {
                if($size) {
                    $arr[$size] = true;
                }
            }
            $obj = (object) $arr;

            DB::table('color_product')->where([
                ['product_id', '=', $product->id],
                ['color_id', '=', $color],
            ])->update(['sizes' => json_encode($obj)]);
        }

        return;
    }

    public function updateColorsAndSizes($result,$product) {
        $product->colors()->detach();

        foreach($result['colors'] as $color) {

            $product->colors()->attach($color);

            $arr = array();

            foreach($result[$color] as $size) {
                if($size) {
                    $arr[$size] = true;
                }
            }
            $obj = (object) $arr;

            DB::table('color_product')->where([
                ['product_id', '=', $product->id],
                ['color_id', '=', $color],
            ])->update(['sizes' => json_encode($obj)]);
        }

        return;
    }

    public function edit($id,Request $request) {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {

            $old = \App\Product::where('id',$id)->first();







            if($request->isMethod('delete')) {
                try {
                    $old->categories()->detach();
                    $old->colors()->detach();
                    $old->reviews()->delete();
                    $old->ratings()->delete();

                    foreach(json_decode($old->img) as $k => $v) {
                        app(Filesystem::class)->delete(public_path('images/products/admin/' . $v));
                        app(Filesystem::class)->delete(public_path('images/products/big/' . $v));
                        app(Filesystem::class)->delete(public_path('images/products/little/' . $v));
                        app(Filesystem::class)->delete(public_path('images/products/smaller/' . $v));
                    }

                    $old->delete();
                    return redirect()->route('admin_products')->with('status','Товар удален');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
                }
            }

            $old_categories = $old->categories()->get();

            $old_colors = $old->colors()->get();

            $old_colors_id_arr = array();

            foreach($old_colors as $oc) {
                $old_colors_id_arr[$oc->id] = $oc->id;
            }

            $old_colors_sizes = DB::table('color_product')->where([
                ['product_id', '=', $old->id],
            ])->get();

            $sizes_arr = array();
            foreach($old_colors_sizes as $ocs) {
                $sizes_arr[$ocs->color_id] = array();
                $i = 0;
                foreach(json_decode($ocs->sizes) as $key => $size_val) {
                    $sizes_arr[$ocs->color_id][$i] = $key;
                    $i++;
                }
            }

            // dd($sizes_arr);

            if($request->isMethod('post')) {
                try {
                    $result = $request->all();



                    $validator = Validator::make($result,[
                        'name_tk'=>'required',
                        'code'=>'required',
                        'price'=>'required',
                        'category_id'=>'required' //на массивы не работает, так что обрабатываем по другому
                    ]);

                    if($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $isNotEmpty = false;

                    foreach($result['category_id'] as $val) {
                        if($val != null) {
                            $isNotEmpty = true;
                            break;
                        }
                    }

                    if($isNotEmpty == false) {
                        return redirect()->back()->withErrors(['epmtyCategories'=>'Выберите хотя бы одну категорию'])->withInput();
                    }

                    // dd($result['orderedNumber']);

                    $input = array();

                    $input['name_tk'] = $result['name_tk'];
                    $input['name_ru'] = $result['name_ru'];
                    $input['name_en'] = $result['name_en'];


                    $input['code'] = $result['code'];
                    $input['price'] = (float) $result['price'];
                    $input['brand'] = $result['brand'];
                    $input['description_tk'] = $result['description_tk'];



                    $input['availability'] = (isset($result['availability'])) ? intval($result['availability']) : 0;
                    $input['new'] = (isset($result['new'])) ? intval($result['new']) : 0;
                    $input['recommended'] = (isset($result['recommended'])) ? intval($result['recommended']) : 0;
                    $input['status'] = (isset($result['status'])) ? intval($result['status']) : 0;


                    $imgsArr = array();

                    if($request->hasFile('main_img')) {
                        $file = $request->file('main_img');

                        $hardPath = Str::random(100);

                        Image::make($request->file('main_img'))
                            ->resize(Config::get('mysetting.product_admin_w'), Config::get('mysetting.product_admin_h'))
                            ->save(public_path().'/images/products/admin/'.$hardPath.'.'.$file->getClientOriginalExtension());
                        Image::make($request->file('main_img'))
                            ->resize(Config::get('mysetting.product_main_w'), Config::get('mysetting.product_main_h'))
                            ->save(public_path().'/images/products/big/'.$hardPath.'.'.$file->getClientOriginalExtension());
                        Image::make($request->file('main_img'))
                            ->resize(Config::get('mysetting.product_little_w'), Config::get('mysetting.product_little_h'))
                            ->save(public_path().'/images/products/little/'.$hardPath.'.'.$file->getClientOriginalExtension());
                        Image::make($request->file('main_img'))
                            ->resize(Config::get('mysetting.product_main_med_w'), Config::get('mysetting.product_main_med_h'))
                            ->save(public_path().'/images/products/smaller/'.$hardPath.'.'.$file->getClientOriginalExtension());

                        $imgsArr['main'] = $hardPath . '.' . $file->getClientOriginalExtension();
                    } else {
                        $imgsArr['main'] = json_decode($old->img)->main;
                    }

                    if ($request->hasFile('other_imgs')) {
                        foreach($request->file('other_imgs') as $key => $image){
                            $hardPath = Str::random(100);

                            Image::make($image)
                                ->resize(Config::get('mysetting.product_main_w'), Config::get('mysetting.product_main_h'))
                                ->save(public_path().'/images/products/big/'.$hardPath.'.'.$image->getClientOriginalExtension());
                            Image::make($image)
                                ->resize(Config::get('mysetting.product_little_w'), Config::get('mysetting.product_little_h'))
                                ->save(public_path().'/images/products/little/'.$hardPath.'.'.$image->getClientOriginalExtension());

                            $imgsArr[$key] = $hardPath . '.' . $image->getClientOriginalExtension();
                        }
                        if(!empty($result['old_other_imgs'])) {
                            foreach($result['old_other_imgs'] as $key => $image) {
                                $imgsArr[100 + $key] = $image;
                            }
                        }
                    } else {
                        if(!empty($result['old_other_imgs'])) {
                            foreach($result['old_other_imgs'] as $key => $image) {
                                $imgsArr[$key] = $image;
                            }
                        }
                    }

                    foreach(json_decode($old->img) as $k => $v) {
                        if(!in_array($v, $imgsArr)) {
                            app(Filesystem::class)->delete(public_path('images/products/admin/' . $v));
                            app(Filesystem::class)->delete(public_path('images/products/big/' . $v));
                            app(Filesystem::class)->delete(public_path('images/products/little/' . $v));
                            app(Filesystem::class)->delete(public_path('images/products/smaller/' . $v));
                        }
                    }

                    if (!$request->hasFile('other_imgs')) {


                        foreach ($result['orderedNumber'] as $key => $value) {
                            $new_order_img[$value-1] = $imgsArr[$key];
                        }
                        sort($new_order_img);
                        $new_order_img['main'] = $imgsArr['main'];

                        $input['img'] = json_encode((object) $new_order_img, JSON_UNESCAPED_SLASHES);
                    }else{
                        $input['img'] = json_encode((object) $imgsArr, JSON_UNESCAPED_SLASHES);
                    }



                    $old->fill($input);
                    $old->update();

                    $old->categories()->detach();

                    $earlierParentId = 0; //есди вдруг выбирают категории с одним и тем же родителем
                    $earlierMainId = 0; //если вдруг одни и те же категории выбирают

                    foreach($result['category_id'] as $cId) {
                        if($earlierMainId != intval($cId) && $cId != null) {
                            $old->categories()->attach($cId);

                            if(\App\Category::find($cId)->category_id != $earlierParentId) {
                                $parent = \App\Category::find($cId)->category_id;
                                $old->categories()->attach($parent);
                                $earlierParentId = $parent;
                            }

                            $earlierMainId = intval($cId);
                        }
                    }

                    if(array_key_exists ('colors' , $result )) {
                        $this->updateColorsAndSizes($result,$old);
                    }

                    return redirect()->route('admin_products')->with('status','Инофрмация о товаре обновлена');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
                }
            }


            return view('admin.edit_product')->with([
                'categories' => $this->categories,
                'colors' => \App\Color::all(),
                'page_title' => 'Редактировать данные',
                'old' => $old,
                'old_categories' => $old_categories,
                'old_colors_id_arr' => $old_colors_id_arr,
                'old_colors_sizes' => $old_colors_sizes,
                'sizes_arr' => $sizes_arr,
            ]);

        } else {
            abort(403);
        }
    }

    public function detailed($id) {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
            $old = \App\Product::where('id',$id)->first();

            $old_categories = $old->categories()->get();
            // dd($old_categories);

            // if($old_category->category_id) {
            //     $old_parent_category = $old->categories()->where('id',$old_category->category_id)->first();
            // } else {
            //     $old_parent_category = null;
            // }

            $old_colors = $old->colors()->get();

            $old_colors_id_arr = array();

            foreach($old_colors as $oc) {
                $old_colors_id_arr[$oc->id] = $oc->id;
            }

            $old_colors_sizes = DB::table('color_product')->where([
                ['product_id', '=', $old->id],
            ])->get();
            $sizes_arr = array();
            foreach($old_colors_sizes as $ocs) {
                $sizes_arr[$ocs->color_id] = array();
                $i = 0;
                foreach(json_decode($ocs->sizes) as $key => $size_val) {
                    $sizes_arr[$ocs->color_id][$i] = $key;
                    $i++;
                }
            }

            return view('admin.detailed_product')->with([
                'colors' => $old_colors,
                'page_title' => 'Детальная информация о товаре',
                'old' => $old,
                'old_categories' => $old_categories,
                'old_colors_id_arr' => $old_colors_id_arr,
                'old_colors_sizes' => $old_colors_sizes,
                'sizes_arr' => $sizes_arr,
            ]);
        } else {
            abort(403);
        }
    }

    public function change(Request $request, $id){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
            $old = \App\Product::where('id',$id)->first();

            if ($request->get("availability")){
                if($request->get("availability") == 1){
                    $old->availability = 1;
                    $old->save();
                }else if($request->get("availability") == 0){
                    $old->availability = 0;
                    $old->save();
                }
            }

            if($request->get("new")){
                if($request->get("new") == 1){
                    $old->new = 1;
                    $old->save();
                }else if($request->get("new") == 0){
                    $old->new = 0;
                    $old->save();
                }
            }

            if ($request->get("recommended")){
                if($request->get("recommended") == 1){
                    $old->recommended = 1;
                    $old->save();
                }else if($request->get("recommended") == 0){
                    $old->recommended = 0;
                    $old->save();
                }
            }

            if($request->get("status")){
                if($request->get("status") == 1){
                    $old->status = 1;
                    $old->save();
                }else if($request->get("status") == 0){
                    $old->status = 0;
                    $old->save();
                }
            }







            return json_encode("all_rigth", 200);
        }
    }







}




//<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Illuminate\Filesystem\Filesystem;
//use Intervention\Image\Facades\Image;
//use Illuminate\Support\Str;
//use Validator;
//use Config;
//use DB;
//
//class AdminProductController extends SiteController
//{
//    public function index() {
//        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
//            $products = \App\Product::paginate(10);
//            return view('admin.products')->with(
//                [
//                    'products'=> $products,
//                    'page_title'=>'Товары',
//                ]
//            );
//         } else {
//             abort(403);
//         }
//    }
//
//    public function add(Request $request) {
//        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
//            if($request->isMethod('post')){
//                try {
//                    $result = $request->all();
//
//                    $validator = Validator::make($result,[
//                        'name_tk'=>'required',
//                        'code'=>'required',
//                        'price'=>'required',
//                        'main_img'=>'required'
//                    ]);
//
//                    if($validator->fails()) {
//                        return redirect()->back()->withErrors($validator)->withInput();
//                    }
//
//                    $category = \App\Category::find($result['category_id']);
//
//                    $imgsArr = array();
//
//                    if($request->hasFile('main_img')) {
//                        $file = $request->file('main_img');
//
//                        $hardPath = Str::random(100);
//
//                        Image::make($request->file('main_img'))
//                            ->resize(Config::get('mysetting.product_admin_w'), Config::get('mysetting.product_admin_h'))
//                            ->save(public_path().'/images/products/admin/'.$hardPath.'.'.$file->getClientOriginalExtension());
//                        Image::make($request->file('main_img'))
//                            ->resize(Config::get('mysetting.product_main_w'), Config::get('mysetting.product_main_h'))
//                            ->save(public_path().'/images/products/big/'.$hardPath.'.'.$file->getClientOriginalExtension());
//                        Image::make($request->file('main_img'))
//                            ->resize(Config::get('mysetting.product_little_w'), Config::get('mysetting.product_little_h'))
//                            ->save(public_path().'/images/products/little/'.$hardPath.'.'.$file->getClientOriginalExtension());
//                        Image::make($request->file('main_img'))
//                            ->resize(Config::get('mysetting.product_main_med_w'), Config::get('mysetting.product_main_med_h'))
//                            ->save(public_path().'/images/products/smaller/'.$hardPath.'.'.$file->getClientOriginalExtension());
//
//                        $imgsArr['main'] = $hardPath . '.' . $file->getClientOriginalExtension();
//                    }
//
//                    if ($request->hasFile('other_imgs')) {
//                        foreach($request->file('other_imgs') as $key => $image){
//                            $hardPath = Str::random(100);
//
//                            Image::make($image)
//                                ->resize(Config::get('mysetting.product_main_w'), Config::get('mysetting.product_main_h'))
//                                ->save(public_path().'/images/products/big/'.$hardPath.'.'.$image->getClientOriginalExtension());
//                            Image::make($image)
//                                ->resize(Config::get('mysetting.product_little_w'), Config::get('mysetting.product_little_h'))
//                                ->save(public_path().'/images/products/little/'.$hardPath.'.'.$image->getClientOriginalExtension());
//
//                            $imgsArr[$key] = $hardPath . '.' . $image->getClientOriginalExtension();
//                        }
//                    }
//
//                    $product = new \App\Product([
//                        'name_tk' => $result['name_tk'],
////                        'name_ru' => $result['name_ru'],
////                        'name_en' => $result['name_en'],
//                        'code' => $result['code'],
//                        'price' => (float) $result['price'],
//                        'img' => json_encode((object) $imgsArr, JSON_UNESCAPED_SLASHES),
//                        'brand' => $result['brand'],
//                        'description_tk' => $result['description_tk'],
//                        'availability' => (isset($result['availability'])) ? intval($result['availability']) : 0,
//                        'new' => (isset($result['new'])) ? intval($result['new']) : 0,
//                        'recommended' => (isset($result['recommended'])) ? intval($result['recommended']) : 0,
//                        'status' => (isset($result['status'])) ? intval($result['status']) : 0,
//
//                    ]);
//
//                    $category->products()->save($product);
//
//                    $earlier = 0; //id родительской категории предыдущей выбранной категории
//                    //на тот случай, если родитель текущей дополнительной категории
//                    //совпадает с родителем предыдущей дополнительной категории
//                    $earlierMainId = $category->id; //id текущей выбранной категории
//                    //на тот случай, если выбирают одну и ту же категорию несколько раз
//
//                    if($category->category_id) {
//                        $product->categories()->attach($category->category_id);
//
//                        $earlier = $category->category_id;
//                    }
//
//                    foreach($result['additionalcat'] as $key => $val) {
//                        if($val != null && $earlierMainId != intval($val)) {
//                            $c = \App\Category::find($val);
//                            $c->products()->save($product);
//                            if($c->category_id && $c->category_id != $earlier) {
//
//                                $product->categories()->attach($c->category_id);
//
//                                $earlier = $c->category_id;
//                            }
//
//                            $earlierMainId = intval($val);
//                        }
//                    }
//
//                    if(array_key_exists ('colors' , $result )) {
//                        $this->addColorsAndSizes($result,$product);
//                    }
//
//                    return redirect()->route('admin_products')->with('status','Товар добавлен');
//                }
//
//                catch(Exception $e) {
//                    return redirect()->back()->with('error','Ошибка добавления: ' . $e->getMessage());
//                }
//            }
//
//            return view('admin.add_product')->with([
//                'page_title'=>'Новый товар',
//                'colors'=> \App\Color::all(),
//                'categories'=>$this->categories,
//            ]);
//        } else {
//            abort(403);
//        }
//    }
//
//    public function addColorsAndSizes($result,$product) {
//        foreach($result['colors'] as $color) {
//            $product->colors()->attach($color);
//
//            $arr = array();
//
//            foreach($result[$color] as $size) {
//                if($size) {
//                    $arr[$size] = true;
//                }
//            }
//            $obj = (object) $arr;
//
//            DB::table('color_product')->where([
//                ['product_id', '=', $product->id],
//                ['color_id', '=', $color],
//            ])->update(['sizes' => json_encode($obj)]);
//        }
//
//        return;
//    }
//
//    public function updateColorsAndSizes($result,$product) {
//        $product->colors()->detach();
//
//        foreach($result['colors'] as $color) {
//
//            $product->colors()->attach($color);
//
//            $arr = array();
//
//            foreach($result[$color] as $size) {
//                if($size) {
//                    $arr[$size] = true;
//                }
//            }
//            $obj = (object) $arr;
//
//            DB::table('color_product')->where([
//                ['product_id', '=', $product->id],
//                ['color_id', '=', $color],
//            ])->update(['sizes' => json_encode($obj)]);
//        }
//
//        return;
//    }
//
//    public function edit($id,Request $request) {
//        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
//
//            $old = \App\Product::where('id',$id)->first();
//
//            if($request->isMethod('delete')) {
//                try {
//                    $old->categories()->detach();
//                    $old->colors()->detach();
//                    $old->reviews()->delete();
//                    $old->ratings()->delete();
//
//                    foreach(json_decode($old->img) as $k => $v) {
//                        app(Filesystem::class)->delete(public_path('images/products/admin/' . $v));
//                        app(Filesystem::class)->delete(public_path('images/products/big/' . $v));
//                        app(Filesystem::class)->delete(public_path('images/products/little/' . $v));
//                        app(Filesystem::class)->delete(public_path('images/products/smaller/' . $v));
//                    }
//
//                    $old->delete();
//                    return redirect()->route('admin_products')->with('status','Товар удален');
//                }
//                catch(Exception $e) {
//                    return redirect()->back()->with('error','Ошибка удаления: ' . $e->getMessage());
//                }
//            }
//
//            $old_categories = $old->categories()->get();
//
//            $old_colors = $old->colors()->get();
//
//            $old_colors_id_arr = array();
//
//            foreach($old_colors as $oc) {
//                $old_colors_id_arr[$oc->id] = $oc->id;
//            }
//
//            $old_colors_sizes = DB::table('color_product')->where([
//                ['product_id', '=', $old->id],
//            ])->get();
//
//            $sizes_arr = array();
//            foreach($old_colors_sizes as $ocs) {
//                $sizes_arr[$ocs->color_id] = array();
//                $i = 0;
//                foreach(json_decode($ocs->sizes) as $key => $size_val) {
//                    $sizes_arr[$ocs->color_id][$i] = $key;
//                    $i++;
//                }
//            }
//
//            // dd($sizes_arr);
//
//            if($request->isMethod('post')) {
//                try {
//                    $result = $request->all();
//
//
//
//                    $validator = Validator::make($result,[
//                        'name_tk'=>'required',
//                        'code'=>'required',
//                        'price'=>'required',
//                        'category_id'=>'required' //на массивы не работает, так что обрабатываем по другому
//                    ]);
//
//                    if($validator->fails()) {
//                        return redirect()->back()->withErrors($validator)->withInput();
//                    }
//
//                    $isNotEmpty = false;
//
//                    foreach($result['category_id'] as $val) {
//                        if($val != null) {
//                            $isNotEmpty = true;
//                            break;
//                        }
//                    }
//
//                    if($isNotEmpty == false) {
//                        return redirect()->back()->withErrors(['epmtyCategories'=>'Выберите хотя бы одну категорию'])->withInput();
//                    }
//
//                    // dd($result['orderedNumber']);
//
//                    $input = array();
//
//                    $input['name_tk'] = $result['name_tk'];
////                    $input['name_ru'] = $result['name_ru'];
////                    $input['name_en'] = $result['name_en'];
//                    $input['code'] = $result['code'];
//                    $input['price'] = (float) $result['price'];
//                    $input['brand'] = $result['brand'];
//                    $input['description_tk'] = $result['description_tk'];
//                    $input['availability'] = (isset($result['availability'])) ? intval($result['availability']) : 0;
//                    $input['new'] = (isset($result['new'])) ? intval($result['new']) : 0;
//                    $input['recommended'] = (isset($result['recommended'])) ? intval($result['recommended']) : 0;
//                    $input['status'] = (isset($result['status'])) ? intval($result['status']) : 0;
//
//                    $imgsArr = array();
//
//                    if($request->hasFile('main_img')) {
//                        $file = $request->file('main_img');
//
//                        $hardPath = Str::random(100);
//
//                        Image::make($request->file('main_img'))
//                            ->resize(Config::get('mysetting.product_admin_w'), Config::get('mysetting.product_admin_h'))
//                            ->save(public_path().'/images/products/admin/'.$hardPath.'.'.$file->getClientOriginalExtension());
//                        Image::make($request->file('main_img'))
//                            ->resize(Config::get('mysetting.product_main_w'), Config::get('mysetting.product_main_h'))
//                            ->save(public_path().'/images/products/big/'.$hardPath.'.'.$file->getClientOriginalExtension());
//                        Image::make($request->file('main_img'))
//                            ->resize(Config::get('mysetting.product_little_w'), Config::get('mysetting.product_little_h'))
//                            ->save(public_path().'/images/products/little/'.$hardPath.'.'.$file->getClientOriginalExtension());
//                        Image::make($request->file('main_img'))
//                            ->resize(Config::get('mysetting.product_main_med_w'), Config::get('mysetting.product_main_med_h'))
//                            ->save(public_path().'/images/products/smaller/'.$hardPath.'.'.$file->getClientOriginalExtension());
//
//                        $imgsArr['main'] = $hardPath . '.' . $file->getClientOriginalExtension();
//                    } else {
//                        $imgsArr['main'] = json_decode($old->img)->main;
//                    }
//
//                    if ($request->hasFile('other_imgs')) {
//                        foreach($request->file('other_imgs') as $key => $image){
//                            $hardPath = Str::random(100);
//
//                            Image::make($image)
//                                ->resize(Config::get('mysetting.product_main_w'), Config::get('mysetting.product_main_h'))
//                                ->save(public_path().'/images/products/big/'.$hardPath.'.'.$image->getClientOriginalExtension());
//                            Image::make($image)
//                                ->resize(Config::get('mysetting.product_little_w'), Config::get('mysetting.product_little_h'))
//                                ->save(public_path().'/images/products/little/'.$hardPath.'.'.$image->getClientOriginalExtension());
//
//                            $imgsArr[$key] = $hardPath . '.' . $image->getClientOriginalExtension();
//                        }
//                        if(!empty($result['old_other_imgs'])) {
//                            foreach($result['old_other_imgs'] as $key => $image) {
//                                $imgsArr[100 + $key] = $image;
//                            }
//                        }
//                    } else {
//                        if(!empty($result['old_other_imgs'])) {
//                            foreach($result['old_other_imgs'] as $key => $image) {
//                                $imgsArr[$key] = $image;
//                            }
//                        }
//                    }
//
//                    foreach(json_decode($old->img) as $k => $v) {
//                        if(!in_array($v, $imgsArr)) {
//                            app(Filesystem::class)->delete(public_path('images/products/admin/' . $v));
//                            app(Filesystem::class)->delete(public_path('images/products/big/' . $v));
//                            app(Filesystem::class)->delete(public_path('images/products/little/' . $v));
//                            app(Filesystem::class)->delete(public_path('images/products/smaller/' . $v));
//                        }
//                    }
//
//                     if (!$request->hasFile('other_imgs')) {
//
//
//                        foreach ($result['orderedNumber'] as $key => $value) {
//                            $new_order_img[$value-1] = $imgsArr[$key];
//                        }
//sort($new_order_img);
// $new_order_img['main'] = $imgsArr['main'];
//
//                        $input['img'] = json_encode((object) $new_order_img, JSON_UNESCAPED_SLASHES);
//                     }else{
//                        $input['img'] = json_encode((object) $imgsArr, JSON_UNESCAPED_SLASHES);
//                     }
//
//
//
//                    $old->fill($input);
//                    $old->update();
//
//                    $old->categories()->detach();
//
//                    $earlierParentId = 0; //есди вдруг выбирают категории с одним и тем же родителем
//                    $earlierMainId = 0; //если вдруг одни и те же категории выбирают
//
//                    foreach($result['category_id'] as $cId) {
//                        if($earlierMainId != intval($cId) && $cId != null) {
//                            $old->categories()->attach($cId);
//
//                            if(\App\Category::find($cId)->category_id != $earlierParentId) {
//                                $parent = \App\Category::find($cId)->category_id;
//                                $old->categories()->attach($parent);
//                                $earlierParentId = $parent;
//                            }
//
//                            $earlierMainId = intval($cId);
//                        }
//                    }
//
//                    if(array_key_exists ('colors' , $result )) {
//                        $this->updateColorsAndSizes($result,$old);
//                    }
//
//                    return redirect()->route('admin_products')->with('status','Инофрмация о товаре обновлена');
//                }
//                catch(Exception $e) {
//                    return redirect()->back()->with('error','Ошибка редактирования: ' . $e->getMessage());
//                }
//            }
//
//
//            return view('admin.edit_product')->with([
//                'categories' => $this->categories,
//                'colors' => \App\Color::all(),
//                'page_title' => 'Редактировать данные',
//                'old' => $old,
//                'old_categories' => $old_categories,
//                'old_colors_id_arr' => $old_colors_id_arr,
//                'old_colors_sizes' => $old_colors_sizes,
//                'sizes_arr' => $sizes_arr,
//            ]);
//
//        } else {
//            abort(403);
//        }
//    }
//
//    public function detailed($id) {
//        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
//            $old = \App\Product::where('id',$id)->first();
//
//            $old_categories = $old->categories()->get();
//            // dd($old_categories);
//
//            // if($old_category->category_id) {
//            //     $old_parent_category = $old->categories()->where('id',$old_category->category_id)->first();
//            // } else {
//            //     $old_parent_category = null;
//            // }
//
//            $old_colors = $old->colors()->get();
//
//            $old_colors_id_arr = array();
//
//            foreach($old_colors as $oc) {
//                $old_colors_id_arr[$oc->id] = $oc->id;
//            }
//
//            $old_colors_sizes = DB::table('color_product')->where([
//                ['product_id', '=', $old->id],
//            ])->get();
//            $sizes_arr = array();
//            foreach($old_colors_sizes as $ocs) {
//                $sizes_arr[$ocs->color_id] = array();
//                $i = 0;
//                foreach(json_decode($ocs->sizes) as $key => $size_val) {
//                    $sizes_arr[$ocs->color_id][$i] = $key;
//                    $i++;
//                }
//            }
//
//            return view('admin.detailed_product')->with([
//                'colors' => $old_colors,
//                'page_title' => 'Детальная информация о товаре',
//                'old' => $old,
//                'old_categories' => $old_categories,
//                'old_colors_id_arr' => $old_colors_id_arr,
//                'old_colors_sizes' => $old_colors_sizes,
//                'sizes_arr' => $sizes_arr,
//            ]);
//        } else {
//            abort(403);
//        }
//    }
//
//    public function change(Request $request, $id){
//        if(auth()->user()->role == 'admin' || auth()->user()->role == 'product_manager') {
//            $old = \App\Product::where('id',$id)->first();
//
//            if($request->get("availability") != null){
//                $answer = $request->get("exist") ? 1 : 0;
//
//                    $old->availability = $answer;
//                    $old->save();
//            }else if($request->get("new") != null){
//
//                $old->new = $old->new == 1 ? 0 : 1;
//                $old->save();
//            }else if($request->get("recommended") != null){
//
//                $old->recommended = $old->recommended == 1 ? 0 : 1;
//                $old->save();
//            }else if($request->get("stat") != null){
//
//
//                    $old->status = $old->status == 1 ? 0 : 1;
//                    $old->save();
//            }
//
//            return json_encode("all_rigth", 200);
//        }
//    }
//
//
//
//
//
//}
