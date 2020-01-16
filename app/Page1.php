<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page1 extends Model
{
	protected $table = 'pages1';
    //
	protected $fillable = ['id', 'name', 'alias', 'caption1', 'caption2', 'text1', 'text2','created_at', 'updated_at'];
}
