<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Portfolio;

use Validator;

class PortfolioEditController extends Controller
{
    public function execute(Portfolio $portfolio,Request $request){
		
		if($request->isMethod('delete')){
				$portfolio->delete();
				return redirect('admin')->with('status','Страница удалена');
			}
			
			if($request->isMethod('post')){
				$input = $request->except('_token');//Вытаскиваем все из БД кроме поля _token
				
				$validator = Validator::make($input,[
												
				'images'=>'image|mimes:jpeg,png,jpg|max:2048'
				
				]);
				
				if($validator->fails()){
				return redirect()
								->route('portfolio')
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
				
				$portfolio->fill($input);//заново заполняем поля в модели Portfolio
				
				if($portfolio->update()){
					return redirect('admin')->with('status','Страница обновлена');
				}
				
				
			}
			
			$old = $portfolio->toArray();
			if(view()->exists('admin.portfolio_edit')){
				$data = [
				
						'title' => 'Редактирование фото '.$old['id'],
						'data' => $old
				
						];
				return view('admin.portfolio_edit',$data);		
		

			}
	}

	public function portfolioAdd(Request $request){
      
		$this->validate($request, [
			'images' => 'image|mimes:jpeg,png,jpg|max:2048',
			'numbers' => 'required',			
		]);

		$file = $request->file('images');
					$file->move(public_path().'/assets/images',$file->getClientOriginalName());//move - из временной директории в каталог
					$input['images'] = $file->getClientOriginalName();
					
//dd($images);
        $portfolio = new Portfolio([
            'images' => $input['images'],
            'numbers' => $request->input('numbers')            
        ]);

        $foto = $portfolio->save();
             
        return redirect('admin')->with('status','Фотография добавлена');
    }
}
