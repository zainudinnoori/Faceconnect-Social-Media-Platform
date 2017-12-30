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
        'body', 'user_id',
    ];


    public function user(){

    	return $this->belongsTo(User::class)->orderBy('created_at','asc');
    }

    public static function getfeed()
    {
        $followers = Auth::user()->follow->toArray();
        $arr = [];
        foreach ($followers as $follower) {
           array_push($arr,$follower['id']);
        }
        array_push($arr, Auth::id());

        return Post::all()->whereIn('user_id', $arr)->sortByDesc('created_at');

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
