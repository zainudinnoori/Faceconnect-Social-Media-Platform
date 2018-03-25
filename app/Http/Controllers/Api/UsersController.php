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
        return response()->json(['userInfo' => $user]);
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


}    