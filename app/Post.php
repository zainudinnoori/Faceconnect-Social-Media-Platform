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

    	return $this->belongsTo(User::class)->orderBy('created_at','asc');
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
        return Post::whereIn('user_id', $arr);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class)->orderBy('id','desc');
    }

    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }
     public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
