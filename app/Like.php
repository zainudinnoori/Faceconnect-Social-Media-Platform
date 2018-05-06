<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
class Like extends Model
{
    protected $fillable=[
    	'post_id','user_id'
    ];
	public function post()
	{	
		return $this->belongsTo(Post::class);
	}

	public function user(){
		return $this->belongsTo(User::class);
	}

  public function likeUser(){
    return $this->belongsTo(User::class, 'user_id','id')->select('id','name','image');
  }

	public static function likers($id){
		
		$post=Post::find($id);
   		$likers= $post->likes;
   		$likerarr = array();
   		foreach($likers as $liker)
   		{
   			$user=$liker->user;
   			array_push($likerarr,$user);
   		}
   		return $likerarr;
   	}

}