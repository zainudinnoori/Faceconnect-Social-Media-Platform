<?php

namespace App;
use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Photo;
use App\Like;
use App\Post;
use Auth;
class Post extends Model
{
    use Notifiable;
	 protected $fillable = [
        'body', 'user_id','parent_id'
    ];


    public function user(){

    	return $this->belongsTo(User::class);
    }

        public function postuser(){

        return $this->belongsTo(User::class,'user_id','id')->select('id','name','image');
    }

    public static function getfeed($uid)
    {
        $user= User::find($uid);
        $followers = $user->follow->toArray();
        $arr = [];
        foreach ($followers as $follower) {
           array_push($arr,$follower['id']);
        }
        array_push($arr, $user->id);
        return Post::whereIn('user_id', $arr)->orderBy('created_at','desc');
    }

    public function latestComments(){
        return $this->comments()->latest()->nPerGroup('post_id',2);
    }
    public function comments()
    {
    	return $this->hasMany(Comment::class, 'post_id','id')->orderBy('id','desc');

    }
     
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function commentSummary()
    {
        return $this->comments()->select('post_id','body','user_id','created_at');
        
    }

    public function CountOflikes()
    {
        return $this->hasMany(Like::class);
    }

}
