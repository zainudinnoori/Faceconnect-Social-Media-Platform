<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use App\User_follow;
class usersController extends Controller
{
    public function index($id)
    {
    	$user = User::find($id);
    	if($user->id === Auth::id())
		{

			$posts = Post::where('user_id',Auth::id())->get();
			return view('home.profile',compact('posts'));
		}
		else
		{
            $already_follow= User_follow::where(['user_id' => Auth::id(),'follow_id' => $id])->first();
            if(is_null($already_follow))
            {
                $status= "Follow"; 
            }
            else
            {
                $status= "Un follow";
            }
			$posts = Post::where('user_id',$id)->get();
            $followings=$user->follow;
			return view('user.profile',compact('posts','user','status','followings'));
		}

    }

    public function showphotos($id)
    {

        $already_follow= User_follow::where(['user_id' => Auth::id(),'follow_id' => $id])->first();
        if(is_null($already_follow))
        {
            $status= "Follow"; 
        }
        else
        {
            $status= "Un follow";
        }
    	$user = User::find($id);
    	$photos= $user->photos;
        $followings=$user->follow;
    	return view('user.photos',compact('photos','user','status','followings'));
    }
}
