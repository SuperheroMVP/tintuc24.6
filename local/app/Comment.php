<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    public function post()
    {
    	return $this->belongsTo('App\Post','idPost','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','idUser','id');
    }
}
