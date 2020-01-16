<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\User;

use Validator;

use App\Comment;

use Mail;

class NewsController extends Controller
{
    //
	public function execute(Request $request){
		
		$news = Post::find([1]);
		
		$post = Post::where('id','>',1)->where('id','<',100)->orderBy('created_at','desk')->paginate(6);
		
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
		
		return view('site.news',array(
										'menu' => $menu,
										'news' => $news,
										'post' => $post,
										)
															);
	
	}
	
	 public function show($id){   
		$post = Post::findOrFail($id);		
			$comments = Comment::where('post_id', $id)->orderBy('created_at','desk')->get();			
        return view('site.show', ['post' => $post, 'comments' => $comments]);
    }
	
	public function showAdd(Request $request){
    
		$this->validate($request, [
			'text' => 'required',			
		]);

        $comment = new Comment([
            'text' => $request->input('text'),
			'post_id' => $request->input('post_id'),	
			'user_id' => $request->input('user_id')	
        ]);
		//dd($comment);
        $commentAdd = $comment->save();

        return back();
    }
}
