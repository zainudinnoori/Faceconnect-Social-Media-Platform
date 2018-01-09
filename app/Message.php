<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Message extends Model
{

    protected $fillable = ['user_id','to_user_id','body'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
