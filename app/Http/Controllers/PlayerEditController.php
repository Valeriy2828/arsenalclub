<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Player;

use Validator;

class PlayerEditController extends Controller
{
    //
	public function execute(Player $player,Request $request){
		
		if($request->isMethod('delete')){
			$player->delete();
			return redirect('admin')->with('status','Страница удалена');
		}
		
		if($request->isMethod('post')){
			$input = $request->except('_token');//Вытаскиваем все из БД кроме поля _token
			
			$validator = Validator::make($input,[
			
			'name'=>'required|max:255',			
			'filter1'=>'required',
			'filter2'=>'required'
			
			]);
			
			if($validator->fails()){
				return redirect()
								->route('playerEdit',['player'=>$input['id']])
								->withErrors($validator);
			}
			
			if($request->hasFile('images')){//загружается ли файл на сервер
				$file = $request->file('images');
				$file->move(public_path().'/assets/images',$file->getClientOriginalName());//move - из временной директории в каталог
				$input['images'] = $file->getClientOriginalName();//getClientOriginalName() получаем реальное имя файла
			}else{
				$input['images'] = $input['old_images'];//если пользователь оставляет старое фото
			}
			
			if($request->hasFile('foto')){
				$foto = $request->file('foto');
				$foto->move(public_path().'/assets/images',$foto->getClientOriginalName());//move - из временной директории в каталог
				$input['foto'] = $foto->getClientOriginalName();//getClientOriginalName() получаем реальное имя файла
			}else{
				$input['foto'] = $input['old_images2'];//если пользователь оставляет старое фото
			}
			
			unset($input['old_images']);//удаление старого фота
			unset($input['old_images2']);
			
			$player->fill($input);//заново заполняем поля в модели Player
			
			if($player->update()){
				return redirect('admin')->with('status','Страница обновлена');
			}
						
		}
		
		$old = $player->toArray();
		if(view()->exists('admin.players_edit')){
			$data = [
			
					'title' => 'Редактирование страницы игрока - '.$old['name'],
					'data' => $old
 			
					];
			return view('admin.players_edit',$data);		
		}
	}
	
	public function playerAdd(Request $request){
      
		$this->validate($request, [
			'name' => 'required|max:255',
			'images' => 'image|mimes:jpeg,png,jpg|max:2048',
			'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
			'filter2' => 'required|max:50',			
			'filter1' => 'required|max:50'			
		]);

		$file = $request->file('images');
					$file->move(public_path().'/assets/images',$file->getClientOriginalName());//move - из временной директории в каталог
					$input['images'] = $file->getClientOriginalName();
		
		$foto = $request->file('foto');
					$foto->move(public_path().'/assets/images',$foto->getClientOriginalName());
					$input['foto'] = $foto->getClientOriginalName();

        $team = new Player([
			'name' => $request->input('name'), 
            'images' => $input['images'],
            'foto' => $input['foto'],
            'filter2' => $request->input('filter2'),            
            'filter1' => $request->input('filter1'),            
            'born' => $request->input('born'),            
            'last_clubs' => $request->input('last_clubs'),            
            'nationality' => $request->input('nationality'),            
            'with_arsenal' => $request->input('with_arsenal')            
                        
        ]);

        $player = $team->save();
             
        return redirect('admin')->with('status','Информация игрока добавлена');
    }
}
