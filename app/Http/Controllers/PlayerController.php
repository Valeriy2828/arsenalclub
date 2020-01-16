<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PlayerController extends Controller
{
    //
	public function execute(){
		if(view()->exists('admin.players')){
			
			$players = \App\Player::all();
			
			$data = [
			
					'title' => 'Страницы',
					'pages' => $players
 			
					];
			return view('admin.players',$data);		
		}
		
		abort(404);		
	}			
}
