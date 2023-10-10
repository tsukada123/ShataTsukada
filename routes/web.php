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

Route::post('/tweet','PostsController@tweet');


//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/index','PostsController@index');
Route::post('/post/update','PostsController@upPost');
Route::get('/post/{id}/delete','PostsController@delete');
Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');
Route::post('/AddUser','UsersController@AddUser');
Route::post('/DeleteUser','UsersController@DeleteUser');

Route::get('/followList','FollowsController@followList');
Route::get('/follower-list','PostsController@index');

Route::get('/logout','PostsController@logout');
