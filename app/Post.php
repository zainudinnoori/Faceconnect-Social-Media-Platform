<?php

namespace App;
use App\User;
use Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	 protected $fillable = [
        'body', 'user_id',
    ];


    public function user(){

    	return $this->belongsTo(User::class)->orderBy('created_at','asc');
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

}
