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

        $posts =Post::getfeed($uid);
        
        $followingsposts= Post::getfeed($uid)->get();
        return response()->json(['followingsposts' => $followingsposts,'posts'=> $posts]);

    }

    public function post($pid){

        $post = Post::find($pid);
        $likeCount = $post->likes->count();
        $commentCount = $post->comments->count();
        $comments = $post->comments()->orderBy('id','desc')->get();
        foreach ($comments as $comment) {
           $comment->user;
        }

        $user = $post->user;
        return response()->json(['post' => $post ,'likeCount' => $likeCount, 'commentCount' => $commentCount ,
            'comments'=> $comments,'user'=>$user]);
    }

}
