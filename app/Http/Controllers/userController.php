<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Comment;
use App\User;
use App\Like;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $comment= Comment
        $Like= new Like;
        $posts = Post::orderBy('created_at','decs')->get();
        return view('user.profile',compact('posts','Like'));
    }

    
    public function update(Request $request, $id)
    {
        if($request->image != null)
        {
            $imagename= time().".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$imagename);
            $user= Auth::user();
            $user->image=$imagename;
            $user->save();
            return back();
         }

         $dob= 
         $user= User::find($id);
         $user->name= request('name');
         $user->email=request('email');
         $user->clocation=request('clocation');
         $user->ccountry=request('ccountry');
         $user->dob= request('dob');
         $user->about= request('about');
         $user->gender= request('gender');
         $user->save();
         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
