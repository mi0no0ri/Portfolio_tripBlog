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
// category
Route::get('/login','UsersController@login');
// contact
Route::get('/contact','UsersController@contact');

// map
Route::get('/map','MapsController@map');