<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WishlistController;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function(){
    User::create([
        'login'=>'ksaparov',
        'name'=>'Kakajan',
        'surname'=>'Saparow',
        'phone'=>'62615930',
        'password'=>Hash::make('123456'),
        'email'=>'saparovkakajandov06@gmail.com',
        'role'=>'admin',
        'address'=>'{"street":"Hudayberdiyew","house":"12","apartment":"14"}',
    ]);
    return ['msg'=>'success added'];
});



Route::middleware(['set_locale'])->group(function (){
    Route::get('locale/{locale}', 'IndexController@changeLocale')->name('locale');

    Route::get('/', 'IndexController@index')->name('main_page');



    Route::get('/prodawayte', 'IndexController@prodawayte')->name('prodawayte');
    Route::get('/mugt_eltip_berme', 'IndexController@mugt_eltip_berme')->name('mugt');
    Route::get('/amatly', 'IndexController@amatly')->name('amatly');
    Route::get('/yenillik', 'IndexController@yenillik')->name('yenillik');
    Route::get('/olceg_gora', 'IndexController@olceg_gora')->name('olceg_gora');

    Route::post('/', 'IndexController@store',function() {
        return view('site.index');
    })->name('pocta');

    Route::get('/search', 'IndexController@search')->name('search');

    Route::post('/search_post', [SearchController::class, 'search_post'])->name('search_post');

    Route::get('/brand', 'BrandController@show')->name('brand_show');
    Route::get('/obraz', 'ObrazController@show_gallery')->name('show_gallery');
    Route::get('/obraz/{id}', 'ObrazController@show_gallery_detail')->name('show_gallery_detail');

    Route::get('/sidedrawer', 'IndexController@sidedrawer')->name('sidedrawer');

    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('wishlist/store/{id}', [WishlistController::class, 'wishlist'])->name('wishlist.post');
    Route::post('wishlist/delete', [WishlistController::class, 'delete'])->name('wishlist.delete');

    Route::post('/otzyw/store','OtzywController@store')->name('otzyw');

    Route::post('/eksklyuziw/store','EksklyuziwController@store')->name('ekslyuziw');
    Route::post('/soobshit/store','SoobshitController@store')->name('soobshit');


    Route::get('podarka','GiftController@add')->name('podarka');

    Route::post('podarka/store','GiftController@store')->name('podarka.store');

    Route::post('upload_data','FileController@store');

    Route::get('catalog/{id}', 'IndexController@getProductsByCatalog')->name('productsByCatalog');
    Route::get('product/{id}', 'IndexController@getProductById')->name('oneProduct');

    Route::get('productBystryyProsmotr/{id}', 'IndexController@getProductBystryyProsmotr')->name('productBystryyProsmotr');

    Route::get('/news/{new_alias?}', 'IndexController@news')->name('news');
    Route::get('/news/profile/{id?}','IndexController@news_profile')->name('news_detail');

    Route::get('getsizes/{color_id}/{prod_id}', 'IndexController@getSizesByColorAndProduct')->name('getSizesByColorAndProduct');
    Route::get('put-size-to-session/{size}', 'IndexController@putSizeToSession')->name('putSizeToSession');

    Route::get('cart/add/{id}', 'CartController@add')->name('addToCart');

    Route::get('cart/plus/{id}', 'CartController@plus')->name('plusToCart');
    Route::get('cart/subtract/{id}', 'CartController@subtract')->name('subtractFromCart');
    Route::post('cart/delete/{id}', 'CartController@delete')->name('deletefromCart');
    Route::get('cart', 'CartController@index')->name('cart');
    Route::get('checkout', 'CartController@check_list')->name('check_list');

    Route::get('clear', 'CartController@clear')->name('clear');




    Route::post('cart/checkout', 'CartController@checkout')->name('checkout');
    Route::get('cart/refund/{id}', 'CartController@refund')->name('refund');

    Route::get('/payment_done/{id}', 'CartController@paymentDone')->name('payment_success');

    Route::post('/rate', 'IndexController@rate')->name('rate');
    Route::match(['get','post'],'email',['uses'=>'MailController@execute','as'=>'email']);
    /*Route::get('search/{alias}','SearchController@find')->name('search');*/

    Route::get('filter/{attr}/{category}/{orderDirection}','IndexController@filter')->name('filter');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('history', 'HomeController@history')->name('history');
    Route::get('history/detailed/{id}', 'HomeController@historyDetailed')->name('history_detailed');
// Route::get('profile', 'HomeController@profile')->name('getprofileinfo');
    Route::match(['get','post'],'profile',['uses'=>'HomeController@profile'])->name('getprofileinfo');


    Route::get('search/results/{alias}','SearchController@getResults')->name('search_results');

    Route::get('search/filter/by/price','SearchController@getFilters')->name('filter_by_price_to_price');



    Route::get('new_p','IndexController@getNewProds')->name('getNewProds');
    Route::post('/new_p_ajax', 'IndexController@getNewAjax')->name('ajax_load');

    Route::group(['prefix' => 'administrator', 'middleware'=>'auth'], function() {
        Route::post('review','IndexController@review')->name('review');

        // Route::get('administrator', 'AdminController@index')->name('admin');
        Route::get('', 'AdminController@index')->name('admin');

        Route::get('admin/products', 'AdminProductController@index')->name('admin_products');
        Route::match(['get','post'],'admin/products/new',['uses'=>'AdminProductController@add'])->name('admin_products_new');
        Route::get('admin/products/detailed/{id}',['uses'=>'AdminProductController@detailed'])->name('admin_products_detailed');
        Route::match(['get','post','delete'],'admin/products/edit/{id}',['uses'=>'AdminProductController@edit'])->name('admin_products_edit');

        Route::post('admin/product_change/{id}', ['uses'=>'AdminProductController@change'])->name('admin_change');


        Route::get('admin/categories', 'AdminCategoryController@index')->name('admin_categories');
        Route::match(['get','post'],'admin/categories/new',['uses'=>'AdminCategoryController@add'])->name('admin_categories_new');
        Route::match(['get','post'],'admin/categories/edit/{id}',['uses'=>'AdminCategoryController@edit'])->name('admin_categories_edit');


        Route::get('admin/content', function() {
            return view('admin.content')->with('page_title','Слайдеры, рекламные блоки, другое');
        })->name('admin_content');
        Route::get('admin/content/slider', 'AdminSliderController@index')->name('admin_slider');
        Route::match(['get','post'],'admin/content/slider/new',['uses'=>'AdminSliderController@add'])->name('admin_slider_new');
        Route::match(['get','post','delete'],'admin/content/slider/edit/{id}',['uses'=>'AdminSliderController@edit'])->name('admin_slider_edit');




        Route::get('admin/content/adblocks', 'AdminAdblocksController@index')->name('admin_adblocks');
        Route::match(['get','post'],'admin/content/adblocks/edit/{id}',['uses'=>'AdminAdblocksController@edit'])->name('admin_adblocks_edit');

        Route::get('admin/content/ikigapdal', 'IkiGapdalSuratController@index')->name('admin_ikigapdal');
        Route::match(['get','post'],'admin/content/ikigapdal/new',['uses'=>'IkiGapdalSuratController@add'])->name('admin_ikigapdal_new');
        Route::match(['get','post','delete'],'admin/content/ikigapdal/edit/{id}',['uses'=>'IkiGapdalSuratController@edit'])->name('admin_ikigapdal_edit');


        Route::get('admin/content/otzyw', 'OtzywController@index')->name('admin_otzyw');
        Route::match(['delete'],'admin/content/otzyw/delete/{id}',['uses'=>'OtzywController@edit'])->name('admin_otzyw_delete');

        Route::get('admin/content/eksklyuziw', 'EksklyuziwController@index')->name('admin_eksklyuziw');
        Route::match(['delete'],'admin/content/eksklyuziw/delete/{id}',['uses'=>'EksklyuziwController@edit'])->name('admin_eksklyuziw_delete');


        Route::get('admin/content/obraz', 'ObrazController@index')->name('admin_obraz');
        Route::match(['get','post'],'admin/content/obraz/new',['uses'=>'ObrazController@add'])->name('admin_obraz_new');
        Route::match(['get','post','delete'],'admin/content/obraz/edit/{id}',['uses'=>'ObrazController@edit'])->name('admin_obraz_edit');


        Route::get('admin/content/brand', 'BrandController@index')->name('admin_brand');
        Route::match(['get','post'],'admin/content/brand/new',['uses'=>'BrandController@add'])->name('admin_brand_new');
        Route::match(['get','post','delete'],'admin/content/brand/edit/{id}',['uses'=>'BrandController@edit'])->name('admin_brand_edit');


        Route::get('admin/content/gift', 'GiftController@index')->name('admin_gift');


        Route::get('admin/content/skidka', 'SkidkaController@index')->name('admin_skidka');
        Route::match(['get','post'],'admin/content/skidka/new',['uses'=>'SkidkaController@add'])->name('admin_skidka_new');
        Route::match(['get','post','delete'],'admin/content/skidka/edit/{id}',['uses'=>'SkidkaController@edit'])->name('admin_skidka_edit');

        Route::get('admin/content/bottomblocks', 'AdminBottomBlocksController@index')->name('admin_bottomblocks');
        Route::match(['get','post'],'admin/content/bottomblocks/{id}',['uses'=>'AdminBottomBlocksController@edit'])->name('admin_bottomblocks_edit');

        Route::get('admin/colors', 'AdminColorController@index')->name('admin_colors');
        Route::match(['get','post'],'admin/colors/new',['uses'=>'AdminColorController@add'])->name('admin_colors_new');
        Route::match(['get','post'],'admin/colors/edit/{id}',['uses'=>'AdminColorController@edit'])->name('admin_colors_edit');

        Route::get('admin/orders', 'AdminOrdersController@index')->name('admin_orders');
        Route::get('/pdf/{id}', 'AdminOrdersController@getPdf')->name('getPdf');
        Route::get('admin/orders/detailed/{id}','AdminOrdersController@detailed')->name('admin_orders_detailed');
        Route::post('admin/orders/editstatus/{id}','AdminOrdersController@editstatus')->name('admin_orders_editstatus');
        Route::match(['get', 'post'], 'admin/edit_order/{id}', 'AdminOrdersController@editOrder')->name('admin_order_edit');

        Route::get('admin/orders/excel_whole_period','AdminOrdersController@excelWholePeriod')->name('admin_orders_excel_all');
        Route::get('admin/orders/excel_this_month','AdminOrdersController@excelThisMonth')->name('admin_orders_excel_thismonth');
        Route::get('admin/orders/excel_last_month','AdminOrdersController@excelLastMonth')->name('admin_orders_excel_lastmonth');

        Route::get('admin/news', 'AdminNewsController@index')->name('admin_news');
        Route::match(['get','post'],'admin/news/new',['uses'=>'AdminNewsController@add'])->name('admin_news_new');
        Route::match(['get','post','delete'],'admin/news/edit/{id}',['uses'=>'AdminNewsController@edit'])->name('admin_news_edit');

        Route::get('admin/warns', 'WarnSkidkaController@index')->name('admin_warns');
        Route::match(['get','post'],'admin/content/warn/new',['uses'=>'WarnSkidkaController@add'])->name('admin_warn_new');
        Route::match(['get','post','delete'],'admin/content/warn/edit/{id}',['uses'=>'WarnSkidkaController@edit'])->name('admin_warn_edit');
        /* Route::get('admin/warns/create', 'WarnSkidkaController@create')->name('admin_warns_create');
     //    Route::match(['get','post'],'admin/warns/new',['uses'=>'WarnSkidkaController@store'])->name('admin_warns_new');
         Route::post('admin/warns/new','WarnSkidkaController@store')->name('admin_warns_new');
         Route::match(['get','post','delete'],'admin/warns/edit/{id}',['uses'=>'WarnSkidkaController@edit'])->name('admin_warns_edit');*/

        Route::get('admin/paid_online','AdminOrdersController@getPaidOnline')->name('admin_paid_online');

        Route::resource('users', 'UsersController', ['except' => ['show']]);
        
        Route::get('/get_color_ajax/{prod_id}', 'AdminOrdersController@ajaxColor')->name('color_ajax');
        Route::get('/get_size_ajax/{prod_id}/{color_id}', 'AdminOrdersController@ajaxSize')->name('size_ajax');
    });

    Auth::routes();


    Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);

//Route::get('/employee/pdf', [WishlistController::class, 'createPDF']);

    Route::get('generate-pdf','WishlistController@createPDF')->name('createPDF');

    Route::get('/order-reset-password', 'PasswordsController@orderResetPassword')->name('account.order_reset_password');
    Route::post('reset_password_without_token', 'PasswordsController@validatePasswordRequest')->name('account.reset_password_without_token');
    Route::get('/reset-password', 'PasswordsController@resetPasswordView')->name('account.reset_password');
    Route::post('reset_password_with_token', 'PasswordsController@resetPassword')->name('account.reset_password_with_token');;

    Route::get('/change-password', 'ChangePasswordController@index')->name('change.password.form');
    Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');


    Route::post('/verificatereg', 'VerifRegistrasionController@sendSMS')->name('verif-registrasion');
    Route::get('/verificate/{id}', 'VerifRegistrasionController@cheackCode')->name('verifi-cheack');
    Route::post('/sendcode', 'VerifRegistrasionController@sendCode')->name('verifi-send');
});


// Route::get('/forget-password', function() {
//     return view('site.forget_password');
// })->name('forget_password');

// usage inside a laravel route
// Route::get('/image', function()
// {
//     $img = Image::make(asset('images/products/5edf84c8c917f.jpg'))->resize(300, 200);

//     return $img->response('jpg');
// });
