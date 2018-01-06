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

    public function home()
    {
        $posts= Post::getfeed();
        $Like= new Like;
        $Post = new Post;
        $User = new User;
        return view('home.index',compact('posts','Like','Post','User'));
        
    }
}
