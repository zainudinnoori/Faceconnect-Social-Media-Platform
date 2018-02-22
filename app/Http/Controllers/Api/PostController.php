<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\Post;


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
}
