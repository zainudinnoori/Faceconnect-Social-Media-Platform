<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\Post;
use App\Like;
use App\Comment;
use Auth;

class PostController extends Controller
{

    public function likes($pid) {
       	$post= Post::find($pid);
        $likes= $post->likes()->with('likeUser')->get();
        
        return response()->json(['likes' => $likes]);
    }

    public function comments($pid){
    $post= Post::find($pid);
    $comments= $post->comments()->with('commentUser')->get();
    return response()->json(['comments' => $comments]);
	}


    public function followingPosts($uid){

        $followingsposts = Post::getfeed($uid)->with('postUser')->with('comments.commentUser')
        ->withCount('likes')->withCount('comments')->get();
        return response()->json(['posts' => $followingsposts]);

    }

}
