<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Like;
use Carbon;
class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $posts= Post::getfeed();
        $Like= new Like;
        return view('home.index',compact('posts','Like'));
        
    }
}
