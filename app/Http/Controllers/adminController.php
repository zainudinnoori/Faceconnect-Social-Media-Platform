<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Like;
use App\Comment;
use App\User_follow;
use Carbon;
use App\Post;
use Auth;
class adminController extends Controller
{
    public function login() {
    	return view ('admin.login');	
    }

    public function index(){
    	return view('admin.index');
    }

    public function postRecords(){
    	$noOfPosts = count(Post::all());
    	$posts = Post::paginate(20)->sortByDesc('created_at');
    	return view('admin.records.postrecords',compact('noOfPosts','posts'));	
    }

    public function userRecords(){
    	$noOfUsers = Count(User::all());
    	$noOfLikes = Count(Like::all());
    	$noOfComments = Count(Comment::all());
    	$noOfRelations = Count(User_follow::all());
    	$mytime = Carbon\Carbon::now()->toDateString();
    	$noOfTodaysUser = User::where('created_at',$mytime)->get();
		$users= User::all();
	    	return view('admin.records.userrecords',compact('noOfUsers','noOfLikes','noOfComments','noOfRelations','users'));	

    }

    public function impersonate($id){
    	$user= User::find($id);
    	$posts= $user->posts;
    	$Like= new Like;
    	$Post = new Post;
    	$User = new User;
    	$impersonateStart = true;
    	auth()->login($user);
    	return view('home.index',compact('posts','Like','Post','User','impersonateStart'));
    }

    public function stopimpersonate()
    {
    	auth()->logout();
    	return redirect('/admin/records/users');
    }

    public function deleteaccount($id){
    	User::find($id)->delete();
    	return back();
    }

    public function deletePost($id){
    	Post::find($id)->delete();
    	return back();
    }

    public function showPost($id){
    	$post = Post::find($id);
    	$Like= new Like;
    	$Post = new Post;
    	$User = new User;
    	return view('admin.records.showpost',compact('post','Like','Post','User'));
    }

    public function userSearch(){
    	$fromdate = request('fromdate');
    	$todate = request('todate');
    	$noOfUsers= User::whereBetween('created_at', [$fromdate, $todate])->get();
    	dd('noOfUser');
    	return response()->json(['success' => 'done']);
    }

    
}
