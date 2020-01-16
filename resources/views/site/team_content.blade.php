<!-- Portfolio -->
<section id="Portfolio" class="content" > 
	<div class="color-team"> 
	<!-- Container -->
		<div class="container portfolio_title">     
			<!-- Logo -->
			<div class="logo6">
				<img src="{{ asset('assets/images/arsenal2019lyak.jpg') }}">
			</div>	
			<!--/Logo -->     
		</div>
    
		<div class="portfolio-top"></div>  
		<!-- Portfolio Filters -->
		<div class="portfolio">
			  @if(isset($teams))						
					<div id="filters" class="sixteen columns">
					  <ul class="clearfix">
						<li><a id="all" href="#" data-filter="*" class="active">
						  <h5>Вся команда</h5>
						</a></li>  
						  @foreach($teams as $team)
							<li><a class="" href="#" data-filter=".{{ $team }}">
								<h5>{{ $team }}</h5>
							</a></li>
						  @endforeach				  
					  </ul>
					</div>
			  @endif	
		<!--/Portfolio Filters --> 						
		             				
		<!-- Portfolio Wrapper -->
			<div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> 
				@foreach($players as $player)
					<!-- Portfolio Item -->
						<div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{ $player->filter2 }} isotope-item">
							<div class="portfolio_img">{!!  Html::image('assets/images/'.$player->images,$player->name) !!}</div>        
							<div class="item_overlay">
							  <div class="item_info"> 
								<h4 class="project_name"><a href="{{ url('team/'.$player->slug) }}">{{ $player->name }}</a></h4>
							  </div>
							</div>
						</div>						
				@endforeach				  
			</div>
		<!--/Portfolio Wrapper -->     
	    </div>
    
        <div class="portfolio_btm"></div>
    
		    <div id="project_container">
			    <div class="clear"></div>
			    <div id="project_data"></div>
		    </div> 
    </div> 
</section>
<!--/Portfolio --> 