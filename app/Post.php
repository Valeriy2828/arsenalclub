<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	protected $table = 'posts';
	
	protected $fillable = ['id', 'name', 'text', 'images', 'created_at', 'updated_at'];
	
	public function comments()
  {
    return $this->hasMany('App\Comment');
  }
  
}


