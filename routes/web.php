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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/resetFixedPassword', 'Auth\ResetPasswordController@resetFixedPassword');

Route::post('/verified', 'UserController@verified')->middleware('auth');

Route::resource('articles', 'ArticleController')->middleware('auth');

Route::resource('tags', 'TagController')->middleware('auth');