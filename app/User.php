<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
	protected $fillable = ['name', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];
    protected $table = 'users';
	
	 public static $login = [
							   'username' => 'required|',
							   'email' => 'required|',
							   'password' => 'required',
							   'remember_token' => 'required'
							];
	
	public function commentUser()
  {
    return $this->hasMany('App\Comment');
  }
  
  public function isAdmin()
  {
    return $this->is_admin; 
  }
								
}
