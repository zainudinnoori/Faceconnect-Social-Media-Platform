<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Post;
use App\Comment;
use App\Photo;
use App\User;
use App\Like;
use App\Message;
use App\Blockuser;


class User extends Authenticatable implements JWTSubject
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

        return $this->hasMany(Post::class)->orderBy('created_at','desc');
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
      $blockUsers = $this->hasMany(Blockuser::class)->get()->toArray();
      return $this->belongsToMany(User::class, 'user_follows', 'follow_id', 'user_id');


      // dd($blockUsers);
      // foreach($followers as $follower)
      {

      }
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function block_users()
    {
      return $this->hasMany(Blockuser::class);
    }

    public function getImagePathAttribute()
    {
        return url('images/'.$this->attributes['image']);
      // Rest omitted for brevity
    }
    protected $appends =
    [
        'image_path'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
