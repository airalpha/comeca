<?php

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

use App\Product;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/vide-panier', function (){
    Cart::destroy();
    return view('shop');
});

Route::get('/test', function (){
    return Product::with('Category', 'Images')->get()->where('slug', 'leslie-guy');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'IndexController@about')->name('about');

Route::get('/shop', 'IndexController@shop')->name('shop');

Route::get('/shop/{slug}', 'IndexController@shopDetail')->name('shop-detail');

Route::post('/api/cart', 'CartController@store')->name('cart.store');

Route::get('/api/cart', 'CartController@index')->name('cart.index');

Route::get('/cart', 'CartController@cart')->name('cart.view');

Route::get('{path}', 'HomeController@index')->where('path', '[-a-z0-9_\s]+');

//Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');

