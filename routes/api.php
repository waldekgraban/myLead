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

Route::group(['prefix'=>'products','as'=>'products.'], function(){
    Route::get('all', 'Api\ProductController@getAllProducts');
    Route::get('show/{id}', 'Api\ProductController@getProduct');
    Route::post('create', 'Api\ProductController@createProduct');
    Route::put('update/{id}', 'Api\ProductController@updateProduct');
    Route::delete('delete/{id}','Api\ProductController@deleteProduct');
});

// Route::apiResource('products', 'ProductController');