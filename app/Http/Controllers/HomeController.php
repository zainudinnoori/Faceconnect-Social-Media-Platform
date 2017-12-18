<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Like;
class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function home()
    {
        // $post= Auth::user()->posts;
        $Like= new Like;
        $posts = Post::orderBy('created_at','decs')->get();
        return view('home.index',compact('posts','Like'));
        // return view('home.index',compact('posts'));
    }
}
