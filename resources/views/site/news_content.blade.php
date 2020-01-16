<!-- news-page-starts -->
	 <div class="Error-found">
		<div class="container">			
				<div class="error-page text-center">
					@if(isset($news) && is_object($news))			
						@foreach($news as $new1)
							<div class="logo3">
								{!!  Html::image('assets/images/'.$new1->images) !!}
							</div>						
						@endforeach			
					@endif
				
					@if(isset($post) && is_object($post))	
						@foreach($post as $k=>$posts)
							@if($k%2 == 0)
								<div class="top-news-red">							
									<label><a href="{{ url('news/'.$posts->id) }}">{!!  Html::image('assets/images/'.$posts->images) !!}</a></label>
									<p>{{strip_tags(mb_substr( $posts->text, 0, 400 ))  }}<a href="{{ url('news/'.$posts->id) }}"><em> ...читать полностью</em></a></p>					
									<div class="date-news-red">{{ $posts->created_at->format('d.m.Y в H:i') }}</div>					
								</div>							
							@else							
								<div class="top-news">
									<label><a href="{{ url('news/'.$posts->id) }}">{!!  Html::image('assets/images/'.$posts->images) !!}</a></label>
									<p>{{mb_substr( $posts->text, 0, 400 )  }}<a href="{{ url('news/'.$posts->id) }}"><em> ...читать полностью</em></a></p>
									<div class="date-news">{{ $posts->created_at->format('d.m.Y в H:i') }}</div>
								</div>
							@endif
						@endforeach 	
					@endif																
				</div>
				<div class="links-post">
					<center>				
						{!! $post->links() !!}				
					</center>
				</div>	
		</div>
	</div>
<!-- news-page-section-ends -->
