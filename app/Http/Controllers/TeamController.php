<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Player;

use DB;

class TeamController extends Controller
{
    //
	public function execute(Request $request){
		
		$players = Player::get(array('name','filter2','images','slug'));
		
		$teams = DB::table('players')->distinct()->lists('filter2');
		
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
		
		return view('site.team',array(
										'menu' => $menu,
										'teams' => $teams,
										'players' => $players,
										)
															);
	
	}
	
		
	public function show($slug){
		// If user come from ols link where was id then make 301 redirect.
		if (is_numeric($slug)) {       
			$team = Player::findOrFail($slug);
			return Redirect::to(route('team-show', $team->slug), 301);
		}

		$team = Player::whereSlug($slug)->firstOrFail();
		
		return view('site.show_team', ['team' => $team]);
	}
	
}
