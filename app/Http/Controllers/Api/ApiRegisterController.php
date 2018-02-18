<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;

class RegisterController extends Controller
{

    public function RegisterController(Request $request) {
    	return response() -> json(['User' =>'Register']);
    }

}