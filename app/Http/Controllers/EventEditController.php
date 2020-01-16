<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use Validator;

class EventEditController extends Controller
{
    //
	public function execute(Post $event,Request $request){
		
		if($request->isMethod('delete')){
				$event->delete();
				return redirect('admin')->with('status','Страница удалена');
			}
			
			if($request->isMethod('post')){
				$input = $request->except('_token');//Вытаскиваем все из БД кроме поля _token
				
				$validator = Validator::make($input,[
												
				'text'=>'required'
				
				]);
				
				if($validator->fails()){
				return redirect()
								->route('news')
								->withErrors($validator);
			}
				
				if($request->hasFile('images')){//загружается ли файл на сервер
					$file = $request->file('images');
					$file->move(public_path().'/assets/images',$file->getClientOriginalName());//move - из временной директории в каталог
					$input['images'] = $file->getClientOriginalName();//getClientOriginalName() получаем реальное имя файла
				}else{
					$input['images'] = $input['old_images'];//если пользователь оставляет старое фото
				}
				
				unset($input['old_images']);//удаление старого фота
				
				$event->fill($input);//заново заполняем поля в модели Post
				
				if($event->update()){
					return redirect('admin')->with('status','Страница обновлена');
				}
				
				
			}
			
			$old = $event->toArray();
			if(view()->exists('admin.events_edit')){
				$data = [
				
						'title' => 'Редактирование статьи номер '.$old['id'],
						'data' => $old
				
						];
				return view('admin.events_edit',$data);		
		

			}
	}

	public function eventAdd(Request $request){
      
		$this->validate($request, [
			'images' => 'image|mimes:jpeg,png,jpg|max:2048',
			'text' => 'required',			
		]);

		$file = $request->file('images');
					$file->move(public_path().'/assets/images',$file->getClientOriginalName());//move - из временной директории в каталог
					$input['images'] = $file->getClientOriginalName();
					
//dd($images);
        $post = new Post([
            'images' => $input['images'],
            'text' => $request->input('text')            
        ]);

        $news = $post->save();
             
        return redirect('admin')->with('status','Страница добавлена');
    }
	
}
