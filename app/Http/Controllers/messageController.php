<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;
use App\User;
class messageController extends Controller
{
    public function index(){
    	// $users_chat= Message::pluck('id');
    	// $users_to_chat = $users::where('id','to_user_id');
    	$users = User::where('id','<>',Auth::id())->get();
    	$messages= Message::where('user_id', '=', Auth::id())->orWhere('to_user_id', Auth::id())->get();
    	return view('chat',compact('messages','users'));

    }

    public function store($id)
    {
    	$newMessage = new Message;
    	$newMessage::create([
    		'user_id' => Auth::id(),
    		'to_user_id' => $id,
    		'body' => request('message'),
    	]);
        return response()->json([
          'success' => 'Record has been updated successfully!'
        ]);

    }

    public function getChats($id){
    	$messages= Message::where('user_id',$id)->Where('to_user_id', Auth::id())
        ->orWhere('user_id',Auth::id())->Where('to_user_id', $id)->get();
        $user= User::find($id);
        return response()->json([
          'messages' => $messages,
          'user' => $user,
          'success' => 'Record has been updated successfully!'
        ]);
    }
}
