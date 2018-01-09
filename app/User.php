<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Comment;
use App\Photo;
use App\User;
use App\Like;
use App\Message;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dob','gender','clocation','ccountry','about','image','username','password','cover_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function posts(){

        return $this->hasMany(Post::class);
    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }

    public function photos(){

        return $this->hasMany(Photo::class);
    }

    public function follow()
    {
      return $this->belongsToMany(User::class, 'user_follows', 'user_id', 'follow_id');
    }

    public function followers()
    {
      return $this->belongsToMany(User::class, 'user_follows', 'follow_id', 'user_id');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
