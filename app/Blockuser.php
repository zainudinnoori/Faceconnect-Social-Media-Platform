<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Blockuser extends Model
{
    protected $fillable = [
    	'user_id','block_user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class,'block_user_id','id');
    }
}
