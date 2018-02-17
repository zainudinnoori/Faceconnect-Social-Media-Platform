<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\Post;
use App\User_follow;
use App\Like;
use App\Me;
use Auth;

class ApiUsersController  extends Controller
{

    public function index (Request $request) {
    	$Like= new Like;
        $Post = new Post;
        $User = new User;
    	$user = User::find(1);
    	if($user->id === Auth::id())
		{
            return redirect('profile');            
		}
		else
		{
            $already_follow= User_follow::where(['user_id' => Auth::id(),'follow_id' => 1])->first();
            if(is_null($already_follow))
            {
                $status= "Follow"; 
            }
            else
            {
                $status= "Un follow";
            }
			$posts = Post::where('user_id',1)->orderBy('created_at','desc')->paginate(4);
            if (request()->ajax()) {
             }
            $followings=$user->follow;
    	return response() -> json(['User' => ['followings' => $followings], 'posts' => $posts]);
    }
}

}