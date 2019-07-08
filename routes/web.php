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

// User or Admin Route list here
Route::get('/user', 'HomeController@user');
Route::get('/user/delete/{user_id}', 'HomeController@userdelete');
Route::get('/view/user/profile', 'HomeController@viewuserprofile');

// slider route links
Route::get('/add/slider', 'HomeController@addslider');
Route::get('/slider/delete/{slider_id}', 'HomeController@sliderdelete');
Route::post('/slider/insert', 'HomeController@sliderinsert');
Route::get('/slider/edit/{id}', 'HomeController@slideredit');
Route::post('/edit/slider/insert', 'HomeController@editsliderinsert');
