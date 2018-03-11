<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group(['middleware' => ['api']], function () {

    Route::post('login', '\App\Http\Controllers\Api\AuthController@login');
	Route::post('register','\App\Http\Controllers\Api\AuthController@register');

	//UserController
	Route::get('user/{id}/info','\App\Http\Controllers\Api\UsersController@userInformation');
	Route::get('user/{id}/followers', '\App\Http\Controllers\Api\UsersController@followers');
	Route::get('user/{id}/followings', '\App\Http\Controllers\Api\UsersController@followings');
	Route::get('user/{id}/posts', '\App\Http\Controllers\Api\UsersController@posts');

	//PhotoController
	Route::get('users/{id}/photos','\App\Http\Controllers\Api\PhotoController@photos');

	//postController
	Route::get('post/{pid}/likes','\App\Http\Controllers\Api\PostController@likes');
	Route::get('post/{pid}/comments','\App\Http\Controllers\Api\PostController@comments');
	Route::get('user/{id}/followings/post', '\App\Http\Controllers\Api\PostController@followingPosts');
	Route::get('user/{id}/posts', '\App\Http\Controllers\Api\PostController@myPosts');
	Route::post('/post/store', '\App\Http\Controllers\Api\PostController@storeNewPost');
	Route::post('/post/{postId}/like', '\App\Http\Controllers\Api\PostController@storeNewLike');
	Route::post('/post/{postId}/comment/store', '\App\Http\Controllers\Api\PostController@storeNewComment');
	Route::get('/post/{pId}/{uId}/delete', '\App\Http\Controllers\Api\PostController@deletePost');
	Route::post('/post/{pId}/{uId}/update', '\App\Http\Controllers\Api\PostController@editPost');




	//MessageController
	Route::post('message/write/{fromUserId}/{toUserId}/{body}','\App\Http\Controllers\Api\MessageController@write');
	
	// Route::get('message/recieve','\App\Http\Controllers\Api\MessageController@message');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('user', 'ApiController@getAuthUser');
    
	    });

});


