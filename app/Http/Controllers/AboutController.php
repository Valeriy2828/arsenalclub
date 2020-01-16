<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    public function execute(){
		if(view()->exists('admin.abouts')){
			
			$about = \App\About::where('num','>',5)->orderBy('num')->get();
			
			$data = [
			
					'title' => 'Страницы',
					'pages' => $about
 			
					];
			return view('admin.abouts',$data);		
		}
		
		abort(404);
		
	}
}
