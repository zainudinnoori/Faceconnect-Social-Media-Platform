<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;
use Validator;
use Hash;
use Auth;

class AuthController extends Controller
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


        return response()->json(['token'=> $token,'authId'=> Auth::id() ,'authName' => Auth::user()->name ]);

    }

   
 public function register(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $user = User::where('email', '=', $request->get('email'))->first();
        if ($user === null) {
            $user = new User();
            $user->name = $napacme;
            $user->email = $email;
            $user->dob=request('dob');
            $user->password = bcrypt($request->get('password'));
            $user->save();
            } else {
                return response()->json(['error' => 'User already exists!'], 400);
            }
        
        return response()->json(['message' => 'Registered Successfully'], 200);
    }
}
    