<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Comment;
use App\Photo;
use App\User;
class Photo extends Model
{
    protected $fillable=[
    	'user_id','post_id','photo','extension'
    ];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function user(){

    	return $this->belongsTo(User::class);
    }
}
