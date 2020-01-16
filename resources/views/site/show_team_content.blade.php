<div class="show-team-content">
	<div class="container">	
		<div class="row">
		
			<!-- SHOW TEAM -->
			<h1><div class="col-ml-12 col-sm-12 col-xs-12 team-name text-center">	
				<span style="color:#D8D8D8;"><b>{{ $team->name }}</b></span>
			</h1>
			<div class="col-ml-12 col-sm-12 col-xs-12 show-team text-center">				
				{!!  Html::image('assets/images/'.$team->foto) !!}
			</div>			
			<div class="col-ml-12 col-sm-12 col-xs-12 team-text text-center">	
				<p><span style="color:#424242;">Позиция: {{ $team->filter1 }}</span></p>
			
				
				<p><span style="color:#424242;">Родился: {{ $team->born }}</span></p>
			
				
				<p><span style="color:#424242;">Предыдущие клубы: {{ $team->last_clubs }}</span></p>
			
				
				<p><span style="color:#A4A4A4;">Гражданство: {{ $team->nationality }}</span></p>
			
				
				<p><span style="color:#A4A4A4;">В Арсенале с: {{ $team->with_arsenal }}</span></p>
			</div>			
			
			<!-- END SHOW -->
			
			
		</div>
	</div>
</div>	