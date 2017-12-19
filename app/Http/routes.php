<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ArticlesController@index');
Route::resource('articles', 'ArticlesController');
Route::controller('auth', 'Auth\AuthController');
Route::controller('password', 'Auth\PasswordController');
Route::resource('comments', 'CommentsController',['only' => ['store']]);
