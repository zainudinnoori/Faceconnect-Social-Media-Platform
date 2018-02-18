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
    Route::post('login', '\App\Http\Controllers\Api\ApiController@login');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('user', 'ApiController@getAuthUser');
    
	Route::post('/api/login','\App\Http\Controllers\Api\ApiController@login');
	Route::get('/api/forgot-password', '\App\Http\Controllers\Api\ApiController@ForgotPassword');
	Route::get('/api/register-user','\App\Http\Controllers\Api\ApiRegisterController@RegisterController');
	Route::get('/api/users','\App\Http\Controllers\Api\ApiUsersController@index');
	    });

});


