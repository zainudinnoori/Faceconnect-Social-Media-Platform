<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
class Comment extends Model
{
    protected $fillable =[
    	'user_id','post_id','body',
    ];

    public function post(){
    	return $this->belongsTo(Post::class)->orderBy('created_at','asc');
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

<<<<<<< HEAD
    public function commentUser()
    {
        return $this->belongsTo(User::class,'user_id','id')->select('id','name','image');
    }

=======
    public function commentUser(){
    	return $this->belongsTo(User::class,'user_id','id')->
    		select('id','name','image');
    }
>>>>>>> d697d93c4a2686bc001c4899a59a17ded504c96f


}