<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Like;
use Carbon;
use App\User;
class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function home(Request $request)
    {
        $posts= Post::getfeed(Auth::id())->orderBy('created_at','desc')->paginate(5);
        $Like= new Like;
        $Post = new Post;
        $User = new User;
        if ($request->ajax()) {
            $view = view('home.posts',compact('posts','Like','Post','User'))->render();
            return response()->json(['html'=>$view]);
        }
         return view('home.index',compact('posts','Like','Post','User'));
        
    }
}
