<div class="col-ml-12 col-sm-12 col-xs-12">
	<div class="container">	
		<div class="row">
		<div class="section-title">
			<h2>Форма добавления строки</h2>
		</div>
			<form method="post" action="abouts/add" enctype="multipart/form-data">           
				<div class="col-5">
					<div>				
						<div class="form-group">
							<label for="exampleFormControlFile1">Выбрать файл</label>
							<input type="file" name="images" class="form-control-file" id="exampleFormControlFile1">
						</div>
						<div class="form-group">
							<input name="num" class="form-control" id="exampleFormControlInput1" placeholder="номер строки от 6 до 14">
						</div>
						<div class="form-group">
							<input name="name" class="form-control" id="exampleFormControlInput1" placeholder="имя строки">
						</div>
						<div class="form-group">
							<textarea  name="text" class="form-control" id="exampleFormControlTextarea1"  placeholder="Текст" cols="34" rows="6"></textarea>
						</div>
						<div class="form-group" style="text-align: center;"> 
						<input type="hidden" name="_token" value="{{ csrf_token() }}">					
						<button type="submit" class="bat-button">Добавить строку</button>				
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
					<th scope="col">Id</th>			
					<th scope="col">№ п/п</th>			
					<th scope="col">Имя</th>
					<th scope="col">Фото</th>			
					<th scope="col">Текст</th>					
					<th scope="col">Удаление материала</th>
				</tr>
			</thead>
			<tbody>			
			@foreach($pages as $k => $page)			
				<tr>				
					<th scope="row">{!! Html::link(route('aboutEdit',['about'=>$page->id]),$page->id) !!}</th>
					<td>{{$page->num}}</td>
					<td>{!! Html::link(route('aboutEdit',['about'=>$page->id]),$page->name,['alt'=>$page->name]) !!}</td>
					@if($page->images)
						<td id="abouts-table">{!!  Html::image('assets/images/'.$page->images,$page->name) !!}</td>
					@else
						<td></td>
					@endif
					<td>{{strip_tags($page->text)}}</td>
					<td>
						{!! Form::open(['url'=>route('aboutEdit',['about'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
						
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