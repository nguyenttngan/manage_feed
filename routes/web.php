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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'API\UserController@logout');
Route::get('/register-lecturer', function () {
    return view('auth.register-lecturer');
})->name('register-lecturer');
Route::get('/register-student', function () {
    return view('auth.register-student');
})->name('register-student');
Route::get('/{any}', 'HomeController@index')->where('any', '.*');
