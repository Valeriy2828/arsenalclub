<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //
	protected $table = 'stories';
	
	protected $fillable = ['id', 'name', 'text', 'images', 'created_at', 'updated_at'];
}
