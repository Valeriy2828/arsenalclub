<!-- history-page-starts -->
<div class="history-found-content">
	<div class="container">	
		<div class="row">
			<div class="col-ml-12 col-sm-12 col-xs-12 my-col text-center">
				<div class="history-found">				
					<div class="history-page text-center">
						@if(isset($story) && is_object($story))			
							@foreach($story as $stories)
								<div class="logo4">
									{!!  Html::image('assets/images/'.$stories->images) !!}
								</div>
							@endforeach			
						@endif
						
						@if(isset($story1) && is_object($story1))			
							@foreach($story1 as $stories1)
								<div class="title-history">
									<h3>{{ $stories1->name }}</h3>
								</div>
								<div class="top-history">
									<label>{!!  Html::image('assets/images/'.$stories1->images) !!}</label>
									<p>{{ $stories1->text }}</p>					
								</div>
							@endforeach			
						@endif							
					</div>			
			</div>			
			</div>			
		</div>
	</div>
</div>	
<!-- history-page-section-ends -->