<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('user', 'API\UserController');

//Messages routes
Route::get('contacts', 'API\MessageController@contacts');

Route::get('conversation/{id}', 'API\MessageController@getMessagesFor');

Route::post('conversation/send', 'API\MessageController@sendMessage');

Route::get('orders/mark-validate/{order}', 'API\IndexController@markValidate');

Route::get('producers', 'API\IndexController@producers');

Route::get('orders', 'API\IndexController@orders');

Route::get('all-orders', 'API\IndexController@allOrders');

Route::apiResource('raitings', 'API\RaitingController');

Route::apiResource('profile', 'API\ProfileController');

Route::apiResource('product', 'API\ProductController');

Route::get('product/slug/{slug}', 'API\ProductController@slug');

Route::apiResource('dashboard', 'API\DashboardController');

Route::apiResource('category', 'API\CategoryController');

Route::apiResource('tag', 'API\TagController');

Route::apiResource('discount', 'API\DiscountController');

Route::get('contact/messages/notification/{notification}', 'API\ContactMessageController@notificationRead')->name('contact.messages.read');

Route::apiResource('contact/messages', 'API\ContactMessageController');

//Cart
//Route::apiResource('cart', 'API\CartController');

