<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $table = 'post';
     public function postcategory()
    {
    	return $this->belongsTo('App\PostCategory','PostCategory','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Comment','idPost','id');
    }
}
