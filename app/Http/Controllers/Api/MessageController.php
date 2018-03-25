<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\Message;

class MessageController extends Controller
{

	public function write($FromUserid,$toUserId,$body)
    {
    	$newMessage = new Message;
    	$newMessage::create([
    		'user_id' => $FromUserid,
    		'to_user_id' => $toUserId,
    		'body' => $body,
    	]);
    	return response()-> json(['status' =>'Message sent successfully']);
    }

}