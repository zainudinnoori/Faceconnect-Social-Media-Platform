<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Comment;
use App\User;
 use App\Notifications\InvoicePaid;
class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $followings=Auth::user()->follow;
        $posts = Post::where('user_id',Auth::id())->get();
        return view('home.profile',compact('posts','followings'));
    }

    public function show()
    {
       

        
        $followings=Auth::user()->follow;
        return view('home.profilesetting',compact('followings'));
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

        if($request->coverimage != null)
        {
            $imagename= time().".".$request->coverimage->getClientOriginalExtension();
            $request->coverimage->move(public_path('images'),$imagename);
            $user= Auth::user();
            $user->cover_image=$imagename;
            $user->save();
            return back();
         }

         if(request('name')!=null)
         {
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
         return back();
    }

    public function search()
    {
       $query=request('search_text');
        $users = User::where('name', 'LIKE', '%' . $query . '%')->get();
        // dd($user);
        return view('home.searchresult',compact('users'));
    }
}
