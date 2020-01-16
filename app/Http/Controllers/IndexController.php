<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;

use App\Page1;

use Laravel\Socialite\Facades\Socialite;

use Mail;

class IndexController extends Controller
{
    //
	
	public function execute(Request $request){
		
		if($request->isMethod('post')){//проверяем каким методом выполнен запрос
			$messages = [
			
			'required' => "Поле :attribute обязательно к заполнению",
			'required' => "Поле :attribute должно соответствовать email адресу"
			
			];
			
			$this->validate($request,[ //вылидация формы
									
			'name' => 'required|max:255',// имя максимальная длинна 255
			'email' => 'required|email',//email должен обязательно похож на адрес почты
			'text' => 'required'//текст обязателен к заполнению
			
			], $messages);						
			
			$data = $request->all();//Все данные формы сохранены в $data
			
			$result = Mail::send('site.email',['data'=>$data],function($message) use ($data){//send('шаблон'),[наша переменная,ф-ция коллбек, use для примера]
				$mail_admin = env('MAIL_ADMIN');//имя берем из .env
				$message->from($data['email'],$data['name']);//почта отправителя,его имя
				$message->to($mail_admin,'Valeriy5543')->subject('Question');//почта куда->тема сообщения
			});
			
			if($result){
				return redirect()->route('home')->with('status','Сообщение отправлено');//переправка на страницу 'home' и сообщение отправлено
			}
			
			//mail
			
		}
		
		$pages1 = Page1::find([1, 2]);
		$pages2 = Page1::find([3, 4]);;
		
		/*$menu = array();
		
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
		array_push($menu,$item);*/
				
			
		return view('site.index',array(
										//'menu' => $menu,										
										'pages1' => $pages1,
										'pages2' => $pages2,																												
										));
	}
}
		
