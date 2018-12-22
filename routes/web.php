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


Route::get('/','productController@indexx')->name('index');
Route::get('/index','productController@indexx')->name('index');

Route::put('/index', 'SubscribeController@store');
Route::any('/store', 'productController@select')->name('store.select');
Route::put('/store', 'productController@select2')->name('store');
Route::post('/store', 'SubscribeController@store')->name('store/subscribe');

Route::any('/store/{category}', 'productController@selectC');

Route::put('/product', 'productController@cookies')->name('product/add');
Route::any('/product/{id}', 'productController@selectP');
Route::post('/product', 'SubscribeController@store')->name('product/subscribe');
Route::get('/product', function () {
    return view('product');
})->name('product');
Route::any('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::put('/checkout', 'productController@cookies');
Route::put('/checkout', 'productController@placeOrder')->name('checkout/placeorder');
Route::post('/checkout', 'SubscribeController@store')->name('checkout/subscribe');
Route::get('/contact-us',function(){
    return view('contact_us');
})->name('contact-us');
Route::post('contact-us','ContactUsController@send');
/*Route::get('/store', function () {
    return view('store');
})->name('store');*/
Route::get('/about-us','AboutUsController@index')->name('about-us');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

