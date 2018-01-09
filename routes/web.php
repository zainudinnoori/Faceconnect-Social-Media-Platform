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
Route::middleware('auth')->group(function () {

	Route::prefix('post')->group(function () {
		Route::resource('comment','commentController');
	});

	Route::resource('profile','profileController');
	Route::get('/setting','profileController@show')->name('psetting');
	Route::get('/photos','photoController@index')->name('pphotos');
	Route::get('/followers','followersController@index')->name('pfollowers');
	Route::get('/followings','followersController@followings')->name('pfollowings');
	Route::get('search','profileController@search');
	Route::resource('post','postController');
	Route::Post('share/{id}','postController@share');
	Route::post('like/store','likeController@store');   
	Route::get('home','HomeController@home')->name('home');
	Route::get('/user/{id}','usersController@index');
	Route::get('/user/{id}/photos','usersController@showphotos');
	Route::Post('/follow/store','followersController@follow');
	Route::Post('/unfollow/{id}','followersController@unfollow');
	Route::delete('photo/delete/{id}','photoController@destroy');

});

Route::get('post/likers/{id}','likeController@likers');
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));
Route::get('sign-in',function (){
	return view('auth.sign-in');
});

Route::get('logout',function(){
	Auth::logout();
	return view('auth.login');
});


Route::get('/welcome',function(){
	return view('welcome');
});

Route::get('Cnotification',function(){
	$notifications = Auth::user()->unreadnotifications->count();
	return $notifications;
});

Route::get('chatting','messageController@index');
Route::Post('chatting/{id}','messageController@store');
Route::get('chatting/{id}','messageController@getChats');

Route::get('chatw',function(){
	return view('chatwidget');
});




