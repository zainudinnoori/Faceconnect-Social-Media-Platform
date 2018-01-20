<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\User_follow;
use App\Notifications\FollowUser;
use App\Blockuser;
class followersController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	$followers = $user->followers()->paginate(20);
    	$followings=Auth::user()->follow;
    	return view('home.followers',compact('followers','followings'));
    }

    public function follow(Request $request)
    {
    	$_follower= Auth::user();
    	$_userid= $request['following_user_id'];
    	$_user=User::find($_userid);
    	
    	$already_follow= User_follow::where(['user_id' => $_follower->id,'follow_id' => $_userid])->first();
    	if(is_null($already_follow))
    	{
	    	$_follower->follow()->save($_user);
	    	$count_followers= count($_user->followers);
	    	$response = array(	
				'status' => 'success',
				'msg' => 'followed',
				'count' => $count_followers,
				);
	     	//sending notificaion
	    	
	    	$user= User::find($_userid);
	    	if($user->id != Auth::id())
	    	{
			$user->notify(new FollowUser());
    		
			}
			 //end
			return \Response::json( $response );	
    	}
    	else
    	{
    		$_follower->follow()->detach($_user);
    		$count_followers= count($_user->followers);
    		$response = array(	
			'status' => 'success',
			'msg' => 'unfollowed',
			'count' => $count_followers,
			);
			return \Response::json( $response );
    	}
    }

    public function followings()
    {
    	$followers = Auth::user()->followers;
    	$followings=Auth::user()->follow()->paginate(20);
    	return view('home.followings',compact('followings','followers'));
    }
    
    public function unfollow($id)
    {
        $_follower= Auth::user();
        $_user=User::find($id);
        $_follower->follow()->detach($_user);
        return response()->json([
          'success' => 'Unfollowed successfully!'
        ]);
    }

    public function blockUser($id)
    {
        $blockuser=Blockuser::where('user_id',Auth::id())->where('block_user_id',$id)->first();
        if(!count($blockuser))
        {
            Blockuser::create([
                'user_id'=>Auth::id(),
                'block_user_id' => $id,
            ]);
        }
        return response()->json([
             'success' => 'user is blocked now',
        ]);
    }

    public function unblockUser($id)
    {
           Blockuser::find($id)->first()->delete();
            return response()->json([
                'success'=>'user unblocked', 
            ]);
    }

}
