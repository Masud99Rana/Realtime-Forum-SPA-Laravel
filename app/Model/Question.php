<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Reply;
use App\User;

class Question extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function replies(){
    	return $this->hasMany(Reply::class)->latest();
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
