<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;

class postController extends Controller
{

    public function postController(Request $request) {
    	return response() -> json(['post' =>'create']);
    }

}