<div class="col-ml-12 col-sm-12 col-xs-12">
	<div class="container">	
		<div class="row">
			<div class="section-title">
				<h2>Форма добавления игрока</h2>
			</div>
			<form method="post" action="players/add" enctype="multipart/form-data">           
				<div class="col-5">
					<div>				
						<div class="form-group">
							<label for="exampleFormControlFile1">Выбрать файл для портфолио</label>
							<input type="file" name="images" class="form-control-file" id="exampleFormControlFile1">
						</div>
						<div class="form-group">
							<label for="exampleFormControlFile1">Выбрать файл для фото</label>
							<input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
						</div>
						<div class="form-group">
							<input name="name" class="form-control" id="exampleFormControlInput1" placeholder="имя игрока">
						</div>
						<div class="form-group">
							<input name="filter2" class="form-control" id="exampleFormControlInput1" placeholder="фильтр">
						</div>
						<div class="form-group">
							<input name="filter1" class="form-control" id="exampleFormControlInput1" placeholder="позиция игрока">
						</div>
						<div class="form-group">
							<input name="born" class="form-control" id="exampleFormControlInput1" placeholder="дата рождения">
						</div>
						<div class="form-group">
							<input name="last_clubs" class="form-control" id="exampleFormControlInput1" placeholder="последние клубы">
						</div>
						<div class="form-group">
							<input name="nationality" class="form-control" id="exampleFormControlInput1" placeholder="гражданство">
						</div>
						<div class="form-group">
							<input name="with_arsenal" class="form-control" id="exampleFormControlInput1" placeholder="присоединился к арсеналу">
						</div>
						<div class="form-group" style="text-align: center;"> 
						<input type="hidden" name="_token" value="{{ csrf_token() }}">					
						<button type="submit" class="bat-button">Добавить игрока</button>				
						</div>
					</div>
				</div>
			</form>
	@if($pages)
		<div class="section-title">
				<h2>Редактирование</h2>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">№ п/п</th>
					<th scope="col">Имя</th>
					<th scope="col">Портфолио</th>			
					<th scope="col">Фото</th>			
					<th scope="col">Фильтр</th>
					<th scope="col">Позиция</th>
					<th scope="col">ДР</th>
					<th scope="col">История</th>
					<th scope="col">Страна</th>
					<th scope="col">Пришел</th>
					<th scope="col">Удаление материала</th>
				</tr>
			</thead>
			<tbody>
			
			@foreach($pages as $k => $page)
			
				<tr>
				
					<th scope="row">{{$page->id}}</th>
					<td>{!! Html::link(route('playerEdit',['player'=>$page->id]),$page->name,['alt'=>$page->name]) !!}</td>
					<td id="players-table">{!!  Html::image('assets/images/'.$page->images,$page->name) !!}</td>
					<td id="players-table">{!!  Html::image('assets/images/'.$page->foto,$page->name) !!}</td>
					<td>{{$page->filter2}}</td>
					<td>{{$page->filter1}}</td>
					<td>{{$page->born}}</td>
					<td>{{$page->last_clubs}}</td>
					<td>{{$page->nationality}}</td>
					<td>{{$page->with_arsenal}}</td>
					<td>
						{!! Form::open(['url'=>route('playerEdit',['player'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
						
						{{ method_field('DELETE') }}<!--method_field формирует input name и value-->
						{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
						
						{!! Form::close() !!}
					</td>
					
				</tr>
			
			
			@endforeach
			
			</tbody>
			
		</table>
	@endif	
		</div>
	</div>
</div>