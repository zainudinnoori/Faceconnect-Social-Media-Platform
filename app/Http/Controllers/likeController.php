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
				$no_of_likes= Like::where('post_id',$request['post_id'])->count();
				$response = array(	
				'status' => 'success',
				'msg' => 'Liked',
				'no_of_likes'=>$no_of_likes,
				);
				//sending notification
				$post::find($request['post_id']);
				$user=$post->user;
				// if($user->id != Auth::id())
				// {
					$user->notify(new PostLiked($request['post_id']));
				// }
				//end sending notification

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

	   public function likers($id)
	   {
	   		$likers= Like::likers($id);
	   		$no_of_likers=count($likers);
	   		return response()->json([
         	'success' => 'Record has been updated successfully!',
         	'likers' => $likers,
         	'post_id' => $id,
         	'no_of_likers'=>$no_of_likers,
     		]);
	   }
}