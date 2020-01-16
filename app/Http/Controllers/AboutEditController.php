<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\About;

use Validator;

class AboutEditController extends Controller
{
    public function execute(About $about,Request $request){
		
		if($request->isMethod('delete')){
			$about->delete();
			return redirect('admin')->with('status','Запись удалена');
		}
		
		if($request->isMethod('post')){
			$input = $request->except('_token');//Вытаскиваем все из БД кроме поля _token
			
			$validator = Validator::make($input,[
			'num' => 'integer|required|between:6,14',
			'name'=>'max:100',			
			'images'=>'image|mimes:jpeg,png,jpg|max:2048'						
			]);
			
			if($validator->fails()){
				return redirect()
								->route('about')
								->withErrors($validator);
			}
			
			if($request->hasFile('images')){//загружается ли файл на сервер
				$file = $request->file('images');
				$file->move(public_path().'/assets/images',$file->getClientOriginalName());//move - из временной директории в каталог
				$input['images'] = $file->getClientOriginalName();//getClientOriginalName() получаем реальное имя файла
			}
			
			unset($input['old_images']);//удаление старого фота
			
			$about->fill($input);//заново заполняем поля в модели About
			
			if($about->update()){
				return redirect('admin')->with('status','Запись обновлена');
			}
						
		}
		
		$old = $about->toArray();
		if(view()->exists('admin.abouts_edit')){
			$data = [
			
					'title' => 'Редактирование записи - '.$old['name'],
					'data' => $old
 			
					];
			return view('admin.abouts_edit',$data);		
		}
	}
	
	public function aboutAdd(Request $request){
      
		$this->validate($request, [
			'num' => 'integer|required|unique:abouts|between:6,14',
			'images' => 'image|mimes:jpeg,png,jpg|max:2048',
			'name' => 'max:100',						
		]);
	
		if($request->file('images')){
			$file = $request->file('images');
						$file->move(public_path().'/assets/images',$file->getClientOriginalName());//move - из временной директории в каталог
						$input['images'] = $file->getClientOriginalName();
						
			$about = new About([
				'num' => $request->input('num'),			
				'images' => $input['images'],			
				'name' => $request->input('name'), 
				'text' => $request->input('text')            
			]);
		}else{
			$about = new About([
				'num' => $request->input('num'),										
				'name' => $request->input('name'), 
				'text' => $request->input('text')            
			]);
		}
        $club = $about->save();
             
        return redirect('admin')->with('status','Запись добавлена');
    }
}
