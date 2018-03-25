<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;

class PhotoController extends Controller
{

    public function photos($id)
    {
        $user= User::find($id);
        $photos= $user->photos;
        $photosPath = public_path().'/images/'.$photos;
        return response()->json(['photos' => $photosPath]);
    }
    

}
