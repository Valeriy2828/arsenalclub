<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

	//'middleware' - для аутентификации пользователей,если не зарегистрирован перенаправление на рег стр-цу
Route::group([], function () {
		//match когда несколько запросов;  '/' путь к гл странице
    Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);
	Route::match(['get','post'],'/club',['uses'=>'ClubController@execute','as'=>'club']);
	Route::match(['get','post'],'/news',['uses'=>'NewsController@execute','as'=>'news']);
	Route::match(['get','post'],'/news/{id}',['uses'=>'NewsController@show','as'=>'news-show']);
	Route::post('/news/{id}/add',['uses'=>'NewsController@showAdd']);
	Route::match(['get','post'],'/history',['uses'=>'HistoryController@execute','as'=>'history']);
	Route::match(['get','post'],'/foto',['uses'=>'FotoController@execute','as'=>'foto']);
	Route::match(['get','post'],'/team',['uses'=>'TeamController@execute','as'=>'team']);
	Route::match(['get','post'],'/team/{slug}',['uses'=>'TeamController@show','as'=>'team-show']);	
	Route::match(['get','post'],'/politica',['uses'=>'PoliticaController@execute','as'=>'politica']);
	
	//Route::auth();
});

      //Route::get('/', 'IndexController@execute')->name('/');

//admin.....Route::group( [ 'middleware' => 'admin', 'prefix' => 'admin' ], function () {['prefix'=>'admin','middleware'=>'auth']
Route::group([ 'middleware' => 'admin', 'prefix' => 'admin' ],function(){	
	//admin
	Route::get('/',function(){		
		if(view()->exists('admin.index')){
			$data = ['title' => 'панель администратора'];
			
			return view ('admin.index',$data);
		}
	});	
});	

//admin/players
	Route::group(['prefix'=>'players'],function(){
		
		Route::get('/',['uses'=>'PlayerController@execute','as'=>'player']);
		Route::post('/add',['uses'=>'PlayerEditController@playerAdd']);
		
		//admin/players/номер страницы прим 2
		Route::match(['get','post','delete'],'/edit/{player}',['uses'=>'PlayerEditController@execute','as'=>'playerEdit']);
});	


//admin/news
	Route::group(['prefix'=>'developments'],function(){
		
		Route::get('/',['uses'=>'EventController@execute','as'=>'event']);
		Route::post('/add',['uses'=>'EventEditController@eventAdd']);
						
		//admin/news/номер страницы прим 2
		Route::match(['get','post','delete'],'/edit/{event}',['uses'=>'EventEditController@execute','as'=>'eventEdit']);
});	

//admin/portfolio
Route::group(['prefix'=>'portfolio'],function(){
		
		Route::get('/',['uses'=>'PortfolioController@execute','as'=>'portfolio']);
		Route::post('/add',['uses'=>'PortfolioEditController@portfolioAdd']);
						
		//admin/news/номер страницы прим 2
		Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfolioEditController@execute','as'=>'portfolioEdit']);
});


//admin/about
	Route::group(['prefix'=>'abouts'],function(){
		
		Route::get('/',['uses'=>'AboutController@execute','as'=>'about']);
		Route::post('/add',['uses'=>'AboutEditController@aboutAdd']);
		
		//admin/players/номер страницы прим 2
		Route::match(['get','post','delete'],'/edit/{about}',['uses'=>'AboutEditController@execute','as'=>'aboutEdit']);
});	


//user	
Route::auth();

Route::get('/logout', function(){
    \Auth::logout();
    return redirect('/');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

   //Route::get('/home', 'HomeController@index');

//privacy policy
Route::get('/politica', function () {
    return view('site.politica');
});