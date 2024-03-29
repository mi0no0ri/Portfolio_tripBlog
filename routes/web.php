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
Route::get('/','UsersController@top');
Route::post('/','UsersController@search')->name('search');

// profile
Route::get('/profile/{id}','UsersController@profile');

// contact
Route::get('/contact','ContactsController@contact');
Route::post('/contact','ContactsController@create');

// gallery
Route::get('/gallery/{id}/{pref}','PostsController@show');
Route::get('/category/{id}','PostsController@category');
Route::get('/gallery_list/{area_id}','PostsController@gallery');

// search
Route::get('/search','UsersContoller@searchResult');

// login
Auth::routes([
    'register' => false,
]);

// logout
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

// register
Route::get('/register','Auth\RegisterController@register')->name('register');
Route::post('/register','Auth\RegisterController@register')->name('register');

// add
Route::get('/added','Auth\RegisterController@added')->name('added');

Route::group(['middleware' => 'auth'],function()
{
    // login
    Route::get('/loginpage','Auth\LoginController@loginpage');
    // mypage
    Route::get('mypage','ContactsController@mypage')->name('mypage');
    Route::get('mypage/{id}','ListsController@delete')->name('delete');
    Route::post('mypage','ListsController@create')->name('todo');
    Route::get('contactForm','ContactsController@show');
    // post
    Route::get('/post_list','PostsController@post_list')->name('post_list');
    Route::get('/post','Auth\LoginController@post')->name('post');
    Route::get('/post/create','PostsController@create');
    Route::post('/post/create','PostsController@create');
    // post_edit
    Route::get('/post_edit/{id}','PostsController@show_update');
    Route::put('/post_edit/{id}','PostsController@update');
    Route::get('/post_edit/delete/{id}','PostsController@edit_delete');
    // post_delete
    Route::get('/post/delete/{id}','PostsController@delete')->name('delete');
    // profile
    Route::get('/profile_edit','UsersController@profile_edit')->name('profile_edit');
    Route::put('/profile_edit','UsersController@profile_edit')->name('profile_edit');
    // profile_edit
    Route::get('/profile_edit','UsersController@index')->name('profile_edit');
});

