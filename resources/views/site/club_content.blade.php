<!-- about-page-starts -->
	<div class="about-page">
		<div class="container">		
			@if(isset($abouts) && is_object($abouts))			
				@foreach($abouts as $about)			
				<div class="logo1">
					{!!  Html::image('assets/images/'.$about->images) !!}
				</div>			
				<div class="content-gear">				
					<h3>{{ $about->name }}</h3>
					<p>{{ $about->text }}</p>
				</div>			
				@endforeach			
			@endif	
				
			<div class="gear-content">				
				@if(isset($abouts1) && is_object($abouts1))
					@foreach($abouts1 as $about1)
						<h3>{{ $about1->alias }}</h3>
					@endforeach		
				@endif				
				<div class="gear-grid">					
					@if(isset($abouts2) && is_object($abouts2))			
						@foreach($abouts2 as $about2)
							<div class="col-md-4 gear-grids">
								<label>{!!  Html::image('assets/images/'.$about2->images) !!}</label>
									<div class="inner-gear">
										<h5>{{ $about2->name }}</h5></br>
										<p>{{ $about2->text }}</p>
									</div>
								<div class="clearfix"> </div>									
							</div>
						@endforeach							
					@endif											
				</div>	
			</div>															
		</div>
				
			<div class="our-grid">
				<div class="container">
					@if(isset($abouts3) && is_object($abouts3))			
						@foreach($abouts3 as $about3)
						<h3>Главный тренер</h3>
					<div class="do-the">
						<div class=" col-md-6 the-do">
							<h6>{{ $about3->name }}</h6>														
							<p>{{ strip_tags($about3->text) }}</p>																					
						@endforeach							
					@endif
				
					@if(isset($abouts4) && is_object($abouts4))
						@foreach($abouts4 as $about4)
							<p><span>{{ $about4->name }}:</span>{{ strip_tags($about4->text) }}</p>
						@endforeach	
					@endif	
						</div>
						
					@if(isset($abouts5) && is_object($abouts5))
						@foreach($abouts5 as $about5)					
							<div class="col-md-6 grid-img">
								{!!  Html::image('assets/images/'.$about5->images) !!} 
							</div>
						@endforeach	
					@endif	
				
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			
	</div>
	<!-- about-page-section-ends -->