<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PortfolioController extends Controller
{
    public function execute(){
		if(view()->exists('admin.portfolio')){
			
			$portfolio = \App\Portfolio::where('id','>',1)->orderBy('id','desk')->paginate(9);
			
			$data = [
			
					'title' => 'Страницы',
					'pages' => $portfolio
 			
					];
			return view('admin.portfolio',$data);		
		}
		
		abort(404);
		
	}
}
