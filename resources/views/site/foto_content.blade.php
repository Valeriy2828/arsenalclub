<!-- photo-page-starts -->
	<div class="project-section" id="portfolio">
		<div class="color-foto"> 
			<div class="container">
				@if(isset($portfolios) && is_object($portfolios))			
					@foreach($portfolios as $portfolio)
						<div class="logo2">
							{!!  Html::image('assets/images/'.$portfolio->images) !!}
						</div>	
						<div class="project-section-head text-center">
							<h3>{{ $portfolio->title }}</h3>
						</div>
					@endforeach			
				@endif
									
				<div id="portfoliolist">
					@if(isset($portfolios1) && is_object($portfolios1))			
						@foreach($portfolios1 as $portfolio1)
							<div class="portfolio app mix_all  wow bounceIn" data-wow-delay="0.4s"  style="display: inline-block; opacity: 1;">
								<div class="portfolio-wrapper grid_box">		
									  <a class="swipebox" rel="group" href="{{ asset('assets/images/'.$portfolio1->images) }}"   title={{ $portfolio1->numbers }}>{!!  Html::image('assets/images/'.$portfolio1->images) !!}<span class="zoom-icon"></span> </a>
								</div>
							</div>
						@endforeach							
					@endif																						
				</div>
				
				<div class="links-mg">
					<center>				
						{!! $portfolios1->links() !!}				
					</center>
				</div>
			</div>
		</div>
	</div>
<!-- photo-page-section-ends -->
	  
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 
	<script type="text/javascript" src="{{ asset('assets/js/fancybox/jquery.mousewheel-3.0.4.pack.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/fancybox/jquery.fancybox-1.3.4.pack.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/fancybox/jquery.fancybox-1.3.4.css') }}" media="screen">

	<script>	
		jQuery(document).ready(function(){
			$('a.swipebox').fancybox();		
		});	
	</script>
	