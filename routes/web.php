<?php

use Illuminate\Http\Request;
use \App\Subscribe;

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

Route::get('/index', function () {
    return view('index');
})->name('index');
Route::get('/', function () {
    return view('index');
});

Route::put('/index', 'SubscribeController@store');
Route::put('/store', 'productController@select');
Route::get('/store', 'productController@select')->name('store');
Route::post('/store', 'productController@select2')->name('store');
Route::post('/store', 'SubscribeController@store')->name('store/subscribe');

Route::any('/store/{category}', 'productController@selectC');

Route::post('/product', 'productController@cookies');
Route::any('/product/{id}', 'productController@selectP');
Route::post('/product', 'SubscribeController@store')->name('product/subscribe');
Route::get('/product', function () {
    return view('product');
});
Route::any('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::put('/checkout', 'productController@cookies');
Route::post('/checkout', 'SubscribeController@store')->name('checkout/subscribe');

/*Route::get('/store', function () {
    return view('store');
})->name('store');*/


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

