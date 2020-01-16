<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
	protected $table = 'abouts';
    //
	protected $fillable = ['id','num', 'name', 'alias', 'text', 'images',  'created_at', 'updated_at'];
}
