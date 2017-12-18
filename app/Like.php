<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Post;
class Like extends Model
{
    protected $fillable=[
    	'post_id','user_id'
    ];
	public function post()
	{	
		return $this->belongsTo(Post::class);
	}
}