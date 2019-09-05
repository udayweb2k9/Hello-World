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
Route::get('/user/list','Api\UserController@list');
Route::post('/user/create','Api\UserController@store');
Route::get('/user/show/{id}','Api\UserController@show');
Route::put('/user/update/{id}','Api\UserController@update');
Route::delete('/user/delete/{id}','Api\UserController@delete');

Route::get('/content/list','Api\ContentController@list');
