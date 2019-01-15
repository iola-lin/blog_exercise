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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/resetFixedPassword', 'Auth\ResetPasswordController@resetFixedPassword');

Route::post('/verified', 'UserController@verified')->middleware('auth');

Route::resource('articles', 'ArticleController')->middleware('auth');

Route::resource('tags', 'TagController')->middleware('auth');