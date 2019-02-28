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

Route::get('feeds', 'FeedController@index');

Route::get('feeds/{id}/read', 'FeedController@read');

Route::post('feeds/{id}/remove', 'FeedController@destroy');

Route::post('feeds/create', 'FeedController@create');
