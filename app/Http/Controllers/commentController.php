<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use app\Notifications;
use App\Comment;
Use App\Post;
use App\User;
use Auth;
use App\Notifications\PostComment;
class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment_body'=>'required'
        ]);

        $comment = new Comment;
        $comment::create([
            'body'=> request('comment_body'),
            'user_id'=> Auth::id(),
            'post_id'=> $request->input('post_id'),
        ]);

        //sending notification
        $post=Post::find($request->input('post_id'));
        $user=$post->user;
        if($user->id != Auth::id())
        {       
           $user->notify(new PostComment(request('comment_body'),$request->input('post_id')));
       }
        // End 
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment=Comment::find($id);
        $comment->body=$request['commentBody'];
        $comment->save();
        return response()->json([
          'success' => 'Record has been updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id)->delete();
        return response()->json([
          'success' => 'Record has been deleted successfully!'
        ]);
    }
}
