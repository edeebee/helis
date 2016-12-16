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


Route::get('/', 'HomeController@index');
Route::get('/group/{id}', 'HomeController@group');
Route::resource('cat', 'CatController');
Route::resource('feed', 'FeedController');
Route::get('/profile', 'AdminController@index');
Route::post('/change', 'AdminController@change');
Route::auth();

Route::get('/404',function(){

    return view('errors.404');
});

