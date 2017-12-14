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


Route::resource('profile','userController');

Route::resource('post','postController');

Route::resource('comment','commentController');

Route::get('/setting',function(){
	return view('user.profilesetting');
});

Route::get('/photos','photoController@index');

Route::get('logout',function(){

	Auth::logout();
});


