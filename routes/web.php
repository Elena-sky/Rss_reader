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
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/profile', 'UserController@profile');

Route::get('/changePassword', 'UserController@showChangePasswordForm');

Route::post('/changePassword', 'UserController@changePassword')->name('changePassword');

Route::get('/edit',   'UserController@edit');

Route::patch('/update', 'UserController@update')->name('update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
