<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\About;

use Mail;

class ClubController extends Controller
{
    //
	public function execute(Request $request){
		
		$abouts = About::where('num',1)->get();
		
		$abouts1 = About::where('num',2)->get();
		
		$abouts2 = About::whereBetween('num', array(3, 5))->get();
		
		$abouts3 = About::where('num',6)->orderBy('num')->get();
		
		$abouts4 = About::whereBetween('num', array(7, 13))->orderBy('num')->get();
		
		$abouts5 = About::where('num',14)->orderBy('num')->get();
				
		
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
		
		return view('site.club',array(
										'menu' => $menu,
										'abouts' => $abouts,
										'abouts1' => $abouts1,
										'abouts2' => $abouts2,
										'abouts3' => $abouts3,
										'abouts4' => $abouts4,
										'abouts5' => $abouts5,
										)
															);
	
	}
}
