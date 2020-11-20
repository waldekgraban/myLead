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

Route::get('products', 'Api\ProductController@getAllProducts');
Route::get('products/{id}', 'Api\ProductController@getProduct');
Route::post('products', 'Api\ProductController@createProduct');
Route::put('products/{id}', 'Api\ProductController@updateProduct');
Route::delete('products/{id}','Api\ProductController@deleteProduct');
