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
        $user= User::find($uid);
        $posts = Post::getfeed($uid)
            ->with(['postUser','latestComments.commentUser'])
            ->withCount('likes')
            ->withCount('comments')
            ->get();
        return response()->json(['posts' => $posts]);
    }


    public function myPosts($uid){
        $user= User::find($uid);
        $posts = $user->posts()
            ->with(['postUser','latestComments.commentUser'])
            ->withCount('likes')
            ->withCount('comments')
            ->get();
        return response()->json(['posts' => $posts]);
    }

    public function storeNewPost()
    {
        $postBody = request('body');
        $userId = request('userId');
        Post::create([
            'user_id'=> $userId,
            'body' => $postBody,
       ]);
        return response()->json(['status' => 'Done']);
    }

    public function storeNewLike($postId)
    {
        $userId = request('userId');
        $like= Like::where(['user_id'=> $userId , 'post_id'=> $postId])->first();
        if(is_null($like))
        {
            Like::create([
            'user_id'=> $userId,
            'post_id' => $postId
            ]);
        return response()->json(['status' => 'Liked']);
        }
        else
        {
            Like::find($like->id)->delete();
            return response()->json(['status' => 'UnLiked']);
        }
            
    }

    public function storeNewComment($postId)
    {
        Comment::create([
            'body' => request('comment_body'),
            'user_id' => request('userId'),
            'post_id' => $postId,
        ]);
        return response()->json(['status'=>'Done']);

    }

    public function deletePost($pId,$uId){
        $post = Post::find($pId);
        if($post){
            if($post->user->id != $uId)
            {
                return response()->json(['status'=> 'faild']);
            }
            else
            {
                $post->delete();
                return response()->json(['status'=> 'done']);
            }
        }
        return response()->json(['status'=> 'faild post doesnt exist']);
    }

    public function editPost($pId,$uId){
        $post = Post::find($pId);
        if($post){
            if($post->user->id != $uId)
            {
                return response()->json(['status'=> 'faild']);
            }
            else
            {
                $post->body = request('postBody');
                $post->save();
                return response()->json(['status'=> 'done']);
            }
        }
        return response()->json(['status'=> 'faild post doesnt exist']);
    }

    public function showPost($pId){
        $post= Post::where('id',$pId)
            ->with(['postUser','comments.commentUser'])
            ->withCount('likes')
            ->withCount('comments')
            ->first();
        return response()->json(['post' => $post]);
    }

    public function share($pId)
    {
        $uId = request('userId');
        Post::create([
            'user_id'=> $uId,
            'parent_id'=> $pId,
        ]);
        return response()->json(['status' => 'done']);
    }
}
