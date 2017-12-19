<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Like;
use App\User;
use App\Post;
use App\Notifications\PostLiked;
class likeController extends Controller
{
	     
	public function store(Request $request)
	    {
		    
	    	$like= new Like;
	    	
			$post = Post::find($request['post_id']);
	    	
	    	$like= Like::where(['user_id'=> Auth::id() , 'post_id'=> $request['post_id']])->first();
	    	if(is_null($like))
	    	{
	    		// event(new App\Events\StatusLiked(Auth::id()));
	    		$like= new Like;
				$like->user_id = $request['user_id'];
				$like->post_id = $request['post_id'];
				$like->save();
				$post::find($request['post_id']);
				$user=$post->user;
				$user->notify(new PostLiked('252'));
				$no_of_likes= Like::where('post_id',$request['post_id'])->count();
				$response = array(	
				'status' => 'success',
				'msg' => 'Liked',
				'no_of_likes'=>$no_of_likes,
				);
				return \Response::json( $response );
			}
			else
			{
				Like::find($like->id)->delete();
				$no_of_likes= Like::where('post_id',$request['post_id'])->count();
				$response = array(	
				'status' => 'success',
				'msg' => 'Unliked',
				'no_of_likes'=>$no_of_likes,
				);
				return \Response::json( $response );
			}
			
	    }
}