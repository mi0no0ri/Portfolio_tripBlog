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

// top
Route::get('/', function () {
    return view('layouts/top');
});
// profile
Route::get('/profile','UsersController@profile');
// contact
Route::get('/contact','UsersController@contact');

// gallery
Route::get('/gallery','MapsController@gallery');

// login
Auth::routes([
    'register' => false,
]);
// logout
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function()
{
    Route::get('/loginpage','Auth\LoginController@loginpage');
    Route::get('/post_list','Auth\LoginController@post_list')->name('post_list');
    Route::get('/post_edit','Auth\LoginController@post_edit')->name('post_edit');
    Route::get('/post','Auth\LoginController@post')->name('post');
    Route::get('/profile_edit','Auth\LoginController@profile_edit')->name('profile_edit');
});

// register
Route::get('/register','Auth\RegisterController@register')->name('register');
Route::post('/register','Auth\RegisterController@register')->name('register');

Route::get('/added','Auth\RegisterController@added')->name('added');

// post
Route::post('/post/create','Auth\PostController@create')->name('create');