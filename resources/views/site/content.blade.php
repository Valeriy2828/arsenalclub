<div class="header-slider" id="home">
<div class="logo">
	<a href="history"><img src="{{ asset('assets/images/ars_logo.png') }}" alt="" /></a>
</div>	
		<div class="slider">
			<div class="callbacks_container">
			  <ul class="rslides" id="slider">
				<li>
				  <img src="{{ asset('assets/images/arsenal1.jpg') }}" alt="">				  
				</li>
				<li>
				  <img src="{{ asset('assets/images/arsenal17.jpg') }}" alt="">					
				</li>
				<li>
				  <img src="{{ asset('assets/images/arsenal5.jpg') }}" alt="">				  
				</li>
			  </ul>
		  </div>
	  </div>
 </div>

	<!-- content-section-starts -->	
		<div class="content">		
			@if(isset($pages1) && is_object($pages1))
				<div class="welcome-section">
					<div class="container">
						@foreach($pages1 as $page1)
							<div class="col-md-6 welcome-grid text-center">
								<h3>{{ $page1->caption1 }}</h3>
								<h5>{{ $page1->caption2 }}</h5>
								<p>{{ $page1->text1 }}</p>
								<p>{{ $page1->text2 }}</p>						
							</div>
						@endforeach							
						<div class="col-md-6 images">
							@foreach($pages1 as $page1)
							  <div class="{{ $page1->img }}">							
								<b>{!!  Html::image('assets/images/'.$page1->images,'',array('class'=>'img-responsive')) !!}</b>
							  </div>
							@endforeach	  
							<div class="clearfix"></div>						
						</div>												
						<div class="clearfix"></div>
					</div>
				</div>
			@endif		
																						
			<div class="about-section text-center">			
				@if(isset($pages2) && is_object($pages2))
					<table>
						<tr>
				@foreach($pages2 as $page2)				
				<div class="container">					
						<h2>{{ $page2->caption1 }}</h2>
							<div class="col-md-6 about-section-grid text-left">
								<td>
									<h4>{{ $page2->caption2 }}</h4>												
									<p>{{ $page2->text1 }}</p>
								</td>
							</div>															
				@endforeach
						</tr>
					</table>	
				@endif
					<div class="clearfix"></div>
						<div class="button-but">
							<a href="{{ route('club') }}" class="btn btn-1 btn-1c">о клубе</a>
						</div>
				</div>	
			</div>
																			
			<div class="textimonials-section text-center">
				<div class="container">					
					<img src="images/t.png" alt="" />
					<div class="button-but-team">
						<a href="{{ route('team') }}" class="btn btn-1 btn-1d">О команде</a>
					</div>	
				</div>
			</div>
		</div>				
	<!-- content-section-ends -->	