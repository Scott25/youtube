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

Route::get('/login', function () {
    return view('Login');
});

Route::post('userLogin','PostController@loginUser');
Route::get('userDetails','UserDetails@index');
Route::get('fetchVideos','UserDetails@fetchVideos');
Route::get('admin','UserDetails@admin');
Route::get('logout','Logout@logout');
Route::get('registaion','UserRegistration@index');
Route::post('createNewUser','UserRegistration@newUser');
Route::post('userVideos','GetUsersAndVideos@getUserDataAndVideos');
Route::post('getSelectedUserVideos','UserDetails@getSelectedUserVideos');
Route::post('upload','VideoUpload@upload');
Route::post('delete_video','VideoUpload@delete_video');


