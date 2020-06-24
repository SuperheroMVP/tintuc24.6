<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
     protected $table = 'postcategoryid';
    public function post()
    {
    	return $this->hasMany('App\Post','PostCategory','id');
    }
    public function childs()
    {
    	return $this->hasMany('App\PostCategory','ParentID');
    }
     public function commnet()
    {
    	return $this->hasMany('App\Comment','idPost','id');
    }
}
