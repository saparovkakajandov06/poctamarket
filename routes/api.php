<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Api\IkiGapdalSuratController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\IndexController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('me', [UserController::class, 'me']);

//     Route::prefix('me')->group(function () {
//         Route::get('orders', [UserController::class, 'orders']);
//         Route::post('update', [UserController::class, 'update']);
//         Route::post('password/change', [UserController::class, 'changePassword']);

//     });

//     Route::post('checkout', [CheckoutController::class, 'store']);    
//     Route::post('logout', [LoginController::class, 'logout']);
// });






Route::prefix('v2')->group(function () {


    Route::group(['middleware' => ['auth:sanctum']], function () {
        // Route::get('me', [UserController::class, 'me']);
    
        Route::prefix('me')->group(function () {
            Route::get('/', [UserController::class, 'me']);
            Route::get('orders', [UserController::class, 'orders']);
            Route::post('update', [UserController::class, 'update']);
            Route::post('password/change', [UserController::class, 'changePassword']);
    
        });
    
        Route::get('payment_done/{id}', [CheckoutController::class, 'paymentDone']);
        Route::post('checkout', [CheckoutController::class, 'store']);  
        Route::post('checkout/save', [CheckoutController::class, 'save']);  
        Route::post('logout', [LoginController::class, 'logout']);
    });


    Route::get('home', [IndexController::class, 'index']);

    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index']);
    });

    Route::prefix('ikigapdalsurat')->group(function () {
        Route::get('/', [IkiGapdalSuratController::class, 'index']);
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/{id}', [CategoryController::class, 'show']);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
    });

    Route::get('search', [SearchController::class, 'index']);

    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('cart/products/check', [ProductController::class, 'cartProductCheck']);

    // Route::post('checkout', [CheckoutController::class, 'store']);
});

Route::post('checkout', [CheckoutController::class, 'store']);




