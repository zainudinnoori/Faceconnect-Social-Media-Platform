<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;

class ApiController extends Controller
{

    // public function __construct()
    // {
    //     $this->user = new User;
    // }
    
   public function login(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(['token' => $token]);
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
    