<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;
use Validator;

class ApiController extends Controller
{

    // public function __construct()
    // {
    //     $this->user = new User;
    // }
    
   public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($token);
    }

    public function ForgotPassword(Request $request) {
    	return response() -> json(['forgot' =>'Password']);
    }



 public function register(Request $request){
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = \Hash::make($request->get('password'));
        $user->save();
        return response()->json(['message' => 'Registered Successfully'], 200);
    }
}
    