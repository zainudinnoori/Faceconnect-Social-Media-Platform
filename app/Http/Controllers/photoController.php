<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Photo;
use App\User;
class photoController extends Controller
{
    public function index(){

    		$followings=Auth::user()->follow;
    		$photos=Auth::user()->photos;
    		return view('home.profilephotos',compact('photos','followings'));

    }
}
