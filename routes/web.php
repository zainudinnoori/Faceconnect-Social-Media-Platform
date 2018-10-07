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

//selecting language
Route::get('locale/{locale}', 'languageController@switchLanguage');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function () {
	//commentting resource
	Route::prefix('post')->group(function () {
		Route::resource('comment','commentController');
	});
	//home page
	Route::get('/','HomeController@home');
	//profile and post resources
	Route::resource('profile','profileController');
	Route::resource('post','postController');
	//home page(index)
	Route::get('home','HomeController@home')->name('home');
	//profile setting,photos,followers,followings 
	Route::get('/setting','profileController@show')->name('psetting');
	Route::get('/photos','photoController@index')->name('pphotos');
	Route::get('/followers','followersController@index')->name('pfollowers');
	Route::get('/followings','followersController@followings')->name('pfollowings');
	//block , unblock a user
	Route::Post('blockuser/{id}','followersController@blockUser');
	Route::get('/unblockuser/{id}','followersController@unblockUser');

	//delete profile photos
	Route::delete('photo/delete/{id}','photoController@destroy');
	//share, like posts
	Route::Post('/share/{id}','postController@share')->name('sharepost');
	Route::post('like/store','likeController@store');   
	//getting likers
	Route::get('post/likers/{id}','likeController@likers');
	//follow,unfollow user
	Route::Post('/follow/store','followersController@follow');
	Route::Post('/unfollow/{id}','followersController@unfollow');
	//User home pag,photos
	Route::get('/user/{id}','usersController@index');
	Route::get('/user/{id}/photos','usersController@showphotos');
	//ajax user search (header)
	Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
	Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));
	Route::get('search','profileController@search');
	//chatting,store, getchats
	Route::Post('chatting/{id}','messageController@store');
	Route::get('chatting','messageController@index');
	Route::get('chatting/{id}','messageController@getChats');
	//logout user
	Route::get('logout',function(){
		Auth::logout();
		return view('auth.login');
	});

	//simple serach!!
	Route::get('search','profileController@search');

});

	Route::get('/admin/login','adminController@login');
	Route::get('/admin','adminController@index');
	Route::get('admin/records/users','adminController@userRecords');
	Route::get('admin/records/posts','adminController@postRecords');
	Route::get('/Impersonate/user/{id}','adminController@impersonate');
	Route::get('/stopImpersonate','adminController@stopimpersonate');
	Route::get('/admin/delete/user/{id}','adminController@deleteaccount');
	Route::get('/admin/delete/post/{id}','adminController@deletePost');
	Route::get('/admin/showpost/{id}','adminController@showPost');
	Route::get('/admin/user/search','adminController@userSearch');
	Route::get('/admin/logout',function(){
	Auth::logout();
	return view('admin.login');
	});



//!!!	
Route::get('sign-in',function (){
	return view('auth.sign-in');
});

Route::get('/welcome',function(){
	return view('welcome');
});

Route::get('Cnotification',function(){
	$notifications = Auth::user()->unreadnotifications->count();
	return $notifications;
});







