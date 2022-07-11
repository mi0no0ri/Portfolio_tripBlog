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
Route::post('/contact','ContactsController@create');

// gallery
Route::get('/gallery','MapsController@gallery');
Route::get('/gallery/{id}','PostsController@show');

// login
Auth::routes([
    'register' => false,
]);

// logout
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function()
{
    // login
    Route::get('/loginpage','Auth\LoginController@loginpage');
    // post
    Route::get('/post_list','Auth\LoginController@post_list')->name('post_list');
    Route::get('/post_edit/{id}','PostsController@update');
    Route::get('/post','Auth\LoginController@post')->name('post');
    // profile
    Route::get('/profile_edit','UsersController@profile_edit')->name('profile_edit');
    Route::put('/profile_edit','UsersController@profile_edit')->name('profile_edit');
    // mypage
    Route::get('mypage','Auth\LoginController@mypage')->name('mypage');
    Route::get('mypage','ContactsController@view');

});

// register
Route::get('/register','Auth\RegisterController@register')->name('register');
Route::post('/register','Auth\RegisterController@register')->name('register');

Route::get('/added','Auth\RegisterController@added')->name('added');

// post
Route::get('/post/create','PostsController@create');
Route::post('/post/create','PostsController@create');

// profile_edit
Route::get('/profile_edit','UsersController@index')->name('profile_edit');

// post_delete
Route::get('/post/delete','LoginController@delete')->name('delete');