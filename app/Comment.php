<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
	
	
	
	protected $fillable = ['id', 'text', 'post_id', 'user_id', 'parent_id', 'created_at', 'updated_at'];
	
    public function post()
  {
    return $this->belongsTo('App\Post');
  }
  
  public function user()
  {
    return $this->belongsTo('App\User');
  }
		
}
