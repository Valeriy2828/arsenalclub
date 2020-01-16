<div class="wrapper container-fluid">

	{!! Form::open(['url' => route('playerEdit',array('player'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group">
		{!!  Form::hidden('id',$data['id']) !!}
		{!!  Form::label('name','Имя:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('name', $data['name'],['class' => 'form-control','placeholder'=>'Введите имя']) !!}
		</div>	
	</div>
				
	<div class="form-group">	
		{!!  Form::label('old_images','Портфолио:',['class' => 'col-xs-2 control-label']) !!}
		<div  class="col-xs-8 col-xs-16">
			{!! Html::image('assets/images/'.$data['images'],'',['class'=>'img-circle img-responsive']) !!}
			{!!  Form::hidden('old_images', $data['images']) !!}
		</div>
	</div>
	
	<div class="form-group">	
		{!!  Form::label('old_images2','Фото:',['class' => 'col-xs-2 control-label']) !!}
		<div  class="col-xs-8 col-xs-16">
			{!! Html::image('assets/images/'.$data['foto'],'',['class'=>'img-circle img-responsive']) !!}
			{!!  Form::hidden('old_images2', $data['foto']) !!}
		</div>
	</div>
	
	<div class="form-group">	
		{!!  Form::label('images','Портфолио:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px; top: 5px;">
			{!!  Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите фото для портфолио','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
		</div>
	</div>
	
	<div class="form-group">	
		{!!  Form::label('foto','Фото:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px; top: 5px;">
			{!!  Form::file('foto', ['class' => 'filestyle','data-buttonText'=>'Выберите фото','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
		</div>
	</div>
	
	<div class="form-group">	
		{!!  Form::label('filter2','Фильтр:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('filter2',$data['filter2'],['class' => 'form-control','placeholder'=>'Фильтр']) !!}
		</div>	
	</div>
	
	<div class="form-group">	
		{!!  Form::label('filter1','Позиция:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('filter1',$data['filter1'],['class' => 'form-control','placeholder'=>'Введите позицию игрока']) !!}
		</div>	
	</div>
	
	<div class="form-group">	
		{!!  Form::label('born','Дата рождения:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('born',$data['born'],['class' => 'form-control','placeholder'=>'Введите дату рождения']) !!}
		</div>	
	</div>
	
	<div class="form-group">	
		{!!  Form::label('last_clubs','Последние клубы:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('last_clubs',$data['last_clubs'],['class' => 'form-control','placeholder'=>'Введите последние клубы игрока']) !!}
		</div>	
	</div>
	
	<div class="form-group">	
		{!!  Form::label('nationality','Национальность:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('nationality',$data['nationality'],['class' => 'form-control','placeholder'=>'Гражданство']) !!}
		</div>	
	</div>
	
	<div class="form-group">	
		{!!  Form::label('with_arsenal','Пришел в клуб:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-md-8" style="padding-left: 30px;">
			{!!  Form::text('with_arsenal',$data['with_arsenal'],['class' => 'form-control','placeholder'=>'Пришел в клуб']) !!}
		</div>	
	</div>
			
	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-10">
			{!!  Form::button('Сохранить',['class' => 'btn btn-primary','type'=>'submit']) !!}
		</div>	
	</div>
	
	
	
		{!!  Form::close() !!}
	
	<script>
		CKEDITOR.replace( 'editor' );
	</script>
</div>