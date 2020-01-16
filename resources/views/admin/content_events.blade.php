<div class="col-ml-12 col-sm-12 col-xs-12">
	<div class="container">	
		<div class="row">
	<div class="section-title">
		<h2>Форма добавления новостей</h2>
	</div>	
	<form method="post" action="developments/add" enctype="multipart/form-data">           
		<div class="col-5">
			<div>
				<div class="form-group">
					<label for="exampleFormControlFile1">Выбрать файл</label>
					<input type="file" name="images" class="form-control-file" id="exampleFormControlFile1">
				</div>	
				<div class="form-group">
					<textarea  name="text" class="form-control" id="exampleFormControlTextarea1"  placeholder="Текст" cols="34" rows="6"></textarea>
				</div>
				<div class="form-group" style="text-align: center;"> 
				<input type="hidden" name="_token" value="{{ csrf_token() }}">					
				<button type="submit" class="bat-button">Добавить новость</button>				
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
				<th scope="col">Фото</th>								
				<th scope="col">Текст статьи</th>				
				<th scope="col">Удаление материала</th>				
			</tr>
		</thead>
		
		<tbody>
		
		@foreach($pages as $k => $page)
		
			<tr>
			
				<th scope="row">{!! Html::link(route('eventEdit',['event'=>$page->id]),$page->id) !!}</th>
				<td><a href="{{ url('developments/edit/'.$page->id) }}">{!!  Html::image('assets/images/'.$page->images,$page->name) !!}</a></td>				
				<td>{{strip_tags($page->text)}}</td>			
				<td class="btn btn-outline-danger">
					{!! Form::open(['url'=>route('eventEdit',['event'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
					
					{{ method_field('DELETE') }}<!--method_field формирует input name и value-->
					{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
					
					{!! Form::close() !!}
				</td>
				
			</tr>
		
		
		@endforeach
		
		</tbody>
		
	</table>
	<div class="links-post">
		<center>				
			{!! $pages->links() !!}				
		</center>
	</div>	
	
@endif	

		</div>
	</div>
</div>