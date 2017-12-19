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
    return view('auth.login');
});

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


Route::resource('profile','profileController')->middleware('auth');

Route::resource('post','postController');

Route::resource('comment','commentController');

Route::get('/setting','profileController@show');

Route::get('/photos','photoController@index');

Route::get('home','HomeController@home')->name('home');

Route::get('/user/{id}','usersController@index');
Route::get('/user/{id}/photos','usersController@showphotos');

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));
Route::get('search','profileController@search');
Route::get('followers','followersController@index')->name('followers');
Route::Post('/follow/store','followersController@follow');

Route::get('followings','followersController@followings')->name('followings');

Route::post('like/store','likeController@store');

Route::get('sign-in',function (){

	return view('auth.sign-in');
});


Route::get('logout',function(){

	Auth::logout();
	return view('auth.login');
});
Route::get('/welcome',function(){
	$user = App\User::find(1); 
	return view('welcome',compact('user'));
});



