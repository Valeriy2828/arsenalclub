<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    //
	public function execute(){
		if(view()->exists('admin.events')){
			
			$events = \App\Post::where('id','>',1)->orderBy('created_at','desk')->paginate(10);
			
			$data = [
			
					'title' => 'Страницы',
					'pages' => $events
 			
					];
			return view('admin.events',$data);		
		}
		
		abort(404);
		
	}
}
