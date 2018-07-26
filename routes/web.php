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
    $entries = [];
    $xml = simplexml_load_file('https://xkcd.com/rss.xml');
    $entries = array_merge($entries, $xml->xpath("//item"));
    usort($entries, function ($feed1, $feed2) {
        return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
    });
    return view('showfeed', ['entries' => $entries]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/profile', 'UserController@profile');

Route::get('/changePassword', 'UserController@showChangePasswordForm');

Route::post('/changePassword', 'UserController@changePassword')->name('changePassword');

Route::get('/edit', 'UserController@edit');

Route::patch('/update', 'UserController@update')->name('update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/users', 'AdminController@index')->name('admin.dashboard');
    Route::get('/', 'AdminController@show')->name('admin');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::resource('/user', 'AdminController', ['as' => 'admin']);
    Route::resource('/admin', 'Auth\AdminCreateController', ['as' => 'admin']);


    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::resource('/rss', 'RssController');

Route::post('/showfeed', 'UserController@showFeed')->name('showfeed');

