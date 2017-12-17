<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\User_follow;
class followersController extends Controller
{
    public function index()
    {
    	
    	$user = Auth::user();
    	$followers = $user->followers;
    	$followings=Auth::user()->follow;
    	return view('home.followers',compact('followers','followings'));
    }

    public function follow(Request $request)
    {
    	$_follower= Auth::user();
    	$_userid= $request['following_user_id'];
    	$_user=User::find($_userid);
    	
    	$already_follow= User_follow::where(['user_id' => $_follower->id,'follow_id' => $_userid])->first();
    	if(is_null($already_follow))
    	{
    	$_follower->follow()->save($_user);
    	$count_followers= count($_user->followers);
    	$response = array(	
			'status' => 'success',
			'msg' => 'followed',
			'count' => $count_followers,
			);
			return \Response::json( $response );	
    	}
    	else
    	{
    		$_follower->follow()->detach($_user);
    		$count_followers= count($_user->followers);
    		$response = array(	
			'status' => 'success',
			'msg' => 'unfollowed',
			'count' => $count_followers,
			);
			return \Response::json( $response );
    	}
    }

    public function followings()
    {
    	$followers = Auth::user()->followers;
    	$followings=Auth::user()->follow;
    	return view('home.followings',compact('followings','followers'));
    }

}
