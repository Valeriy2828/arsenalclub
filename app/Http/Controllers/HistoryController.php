<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Story;

use Mail;

class HistoryController extends Controller
{
    //
	public function execute(Request $request){
		
		$story = Story::find([1]);
		
		$story1 = Story::where('id','>',1)->get();;
		
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
		
		return view('site.history',array(
										'menu' => $menu,
										'story' => $story,
										'story1' => $story1,
										)
															);
	
	}
}
