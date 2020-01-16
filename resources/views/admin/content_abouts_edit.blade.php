<div class="wrapper container-fluid">

	{!! Form::open(['url' => route('aboutEdit',array('about'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
	@if($data['images'])				
		<div class="form-group">	
			{!!  Form::label('old_images','Фото:',['class' => 'col-xs-2 control-label']) !!}
			<div  class="col-xs-8 col-xs-16">
				{!! Html::image('assets/images/'.$data['images'],'',['class'=>'img-circle img-responsive']) !!}
				{!!  Form::hidden('old_images', $data['images']) !!}
			</div>
		</div>		
		<div class="form-group">	
			{!!  Form::label('images','Фото:',['class' => 'col-xs-2 control-label']) !!}
			<div class="col-md-8" style="padding-left: 30px; top: 5px;">
				{!!  Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите фото','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
			</div>
		</div>
	@endif
	<div class="form-group">	
		{!!  Form::label('num','номер записи:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('num',$data['num'],['class' => 'form-control','placeholder'=>'Номер записи от 6 до 14']) !!}
		</div>	
	</div>
	<div class="form-group">	
		{!!  Form::label('name','Название записи:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('name',$data['name'],['class' => 'form-control','placeholder'=>'Название записи']) !!}
		</div>	
	</div>
	<div class="form-group">	
		{!!  Form::label('text','Текст:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-xs-8 col-xs-16" style="top: 10px;">
			{!!  Form::textarea('text', old('text'), ['id' => 'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
		</div>	
	</div>
					
	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-16">
			{!!  Form::button('Сохранить',['class' => 'btn btn-primary','type'=>'submit']) !!}
		</div>	
	</div>
	
	
	
		{!!  Form::close() !!}
	
	<script>
		CKEDITOR.replace('editor');
	</script>
</div>