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

Route::get('producers', 'API\IndexController@producers');

Route::apiResource('profile', 'API\ProfileController');

Route::apiResource('product', 'API\ProductController');

Route::get('product/slug/{slug}', 'API\ProductController@slug');

Route::apiResource('dashboard', 'API\DashboardController');

Route::apiResource('category', 'API\CategoryController');

Route::apiResource('tag', 'API\TagController');

//Cart
//Route::apiResource('cart', 'API\CartController');

