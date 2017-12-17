<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function home()
    {
        // $post= Auth::user()->posts;
        
        $posts = Post::orderBy('created_at','decs')->get();
        return view('home.index',compact('posts'));
        // return view('home.index',compact('posts'));
    }
}
