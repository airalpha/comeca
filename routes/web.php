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

Route::get('/', 'IndexController@index')->name('welcome');

Auth::routes();

Route::get('/vide-panier', function (){
    Cart::destroy();
    return view('cart');
});

Route::get('/test', function (){
    dd(Cart::total());
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'IndexController@about')->name('about');

Route::get('/shop', 'IndexController@shop')->name('shop');

Route::get('/producers', 'IndexController@producer')->name('producers');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/shop/{slug}', 'IndexController@shopDetail')->name('shop-detail');

Route::post('/api/cart', 'CartController@store')->name('cart.store');

Route::delete('/api/cart/{rowId}', 'CartController@destroy')->name('cart.delete');

Route::post('/api/cart/{rowId}', 'CartController@update')->name('cart.update');

Route::post('/api/discount/manage', 'DiscountController@store')->name('discount.store');

Route::post('/api/discount/delete', 'DiscountController@destroy')->name('discount.delete');

Route::post('/api/contact/messages', 'IndexController@store')->name('contact.messages.store');

Route::get('/cart', 'CartController@cart')->name('cart.view');

Route::get('{path}', 'HomeController@index')->where('path', '[-a-z0-9_\s]+');

//Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');

