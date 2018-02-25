<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\Post;
use App\like;
use App\Comment;
use Auth;

class PostController extends Controller
{

    public function likes($pid) {
       	$post= Post::find($pid);
        $likes= $post->likes;
        return response()->json(['likes' => $likes]);
    }

    public function comments($pid){
    $post= Post::find($pid);
    $comments= $post->comments;
    return response()->json(['comments' => $comments]);
	}


    public function followingPosts($uid){

        $user= User::find($uid);
        $posts = $user->posts;
        $Follwingsposts= Post::getfeed($uid)->get();

        return response()->json(['posts' => $posts,
            '-------------------f Posts ' => $Follwingsposts
        ]);
    }

}
