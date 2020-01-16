<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Player extends Model
{
    //
	protected $table = 'players';
	
	protected $fillable = ['id', 'slug', 'name', 'images', 'filter2', 'filter1', 'foto', 'last_clubs', 'nationality', 'born', 'with_arsenal', 'created_at', 'updated_at'];
	
	use Sluggable;	
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
	
	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
