<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Portfolio;

use Mail;

class FotoController extends Controller
{
    //
	public function execute(Request $request){
		
		$portfolios = Portfolio::find([1]);
				
		$portfolios1 = Portfolio::where('id','>',1)->orderBy('id','desc')->paginate(9);		
		
		$menu = array();
		
		$item = array('title'=>'домашняя','alias'=>'home');
		array_push($menu,$item);
		
		$item = array('title'=>'клуб','alias'=>'club');
		array_push($menu,$item);
		
		$item = array('title'=>'новости','alias'=>'news');
		array_push($menu,$item);
		
		$item = array('title'=>'история','alias'=>'history');
		array_push($menu,$item);
		
		$item = array('title'=>'портфолио','alias'=>'foto');
		array_push($menu,$item);
		
		$item = array('title'=>'команда','alias'=>'team');
		array_push($menu,$item);
		
		return view('site.foto',array(
										'menu' => $menu,
										'portfolios' => $portfolios,
										'portfolios1' => $portfolios1,
														)
															);
	
	}
}
