<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
	protected $table = 'portfolios';
	
	protected $fillable = ['id', 'name', 'numbers', 'images', 'title', 'created_at', 'updated_at'];
}
