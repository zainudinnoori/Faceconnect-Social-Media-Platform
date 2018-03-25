<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\User_follow;
use App\Me;
use Auth;
use Storage;
use App\Photo;

class UsersController  extends Controller
{
    public function userInformation($id)
    {
        $user= User::find($id);
        $path = url('/images/'.$user->image);

        return response()->json(['userInfo' => $user,'path' => $path]);
    }

    public function followers($id)
    {
        $user= User::find($id);
        $followers= $user->followers;
        return response()->json(['followers' => $followers]);
    }

    public function followings($id)
    {
        $user= User::find($id);
        $followings= $user->follow;
        return response()->json(['followings' => $followings]);
    }

    public function photos($id)
    {
        $user= User::find($id);
        $photos= $user->photos;
        return response()->json(['photos' => $photos]);
    }

    public function follow()
    {
        $follower = request('authId');
        $userid = request('userId');
        $user = User::find($userid);
        $userfollower = User::find($follower);
        // $already_follow = User_follow::where(['user_id' => $follower,'follow_id' => $userid])->first();
        $already_follow = User_follow::whereUserId($follower)->whereFollowId($userid)->first();
        if(is_null($already_follow))
        {
            $userfollower->follow()->save($user);
            return response('Hello World', 401)->json(['status' => 'followed']);
        }
        else
        {
            $userfollower->follow()->detach($user);
            return response('Hello World', 200)->json(['status' => 'unfollowed']);
        }
    }

    public function notifications($userId)
    {
        $user = User::find($userId);
        $notifications = $user->unreadnotifications;
        return response()->json(['notifications' => $notifications]);
    }



}    