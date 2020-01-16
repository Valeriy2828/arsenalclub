<div class="show-found-content">
	<div class="container">	
		<div class="row">
		
			<!-- SHOW -->
			<div class="col-ml-12 col-sm-12 col-xs-12 show-found text-center">				
				{!!  Html::image('assets/images/'.$post->images) !!}
			</div>			
			<div class="col-ml-12 col-sm-12 col-xs-12 show-text text-center">	
				{{ $post->text }}
			</div>
			<hr>
			<!-- END SHOW -->
			
			<!-- FORM COMMENTS -->
				<div class="col-ml-12 col-sm-12 col-xs-12 form-form text-center">
					@if(!auth()->user())
						<div class="form-brd">Зарегистрируйтесь или войдите чтобы отправлять комментарии</div>
				</div>	
					@else
				<div class="col-md-11 text-center">						
					<form method="post" action="./{{$post->id}}/add">
					{{ csrf_field() }}
						<div class="form-group">							
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="text" placeholder="Ваш комментарий"></textarea>
						</div>
						<div class="form-group">
							<input type="hidden" name="post_id" value="{{$post->id}}">
							<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">							
								<button type="submit" class="bat-button">Добавить комментарий</button>							
						</div>						
					</form>											
				</div>
					@endif
				
			<!-- END  FORM COMMENTS -->

			<!-- COMMENTS OUTPUT -->
				<div class="col-ml-11  show-found text-center">
					<div id="comments">
						<ol class="commentlist group">						
					@foreach($comments as $com)						
						<li id="li-comment-{{$com->id}}" class="comment">
							<div id="comment-{{$com->id}}"  class="comment-container">
								<div class="comment-author vcard">									     
									<cite class="fn">{{ $com->user_id ? $com->user->name : ''}}</cite> 
									<div class="intro">
										<div class="commentDate">								
											{{ $com->created_at ? $com->created_at->format('d.m.Y в H:i') : ''}}
										</div>
									</div>
								</div>
								<div class="comment-meta commentmetadata">										
									<div class="comment-body">
										<p>{{ $com->text }}</p>
									</div>	
								</div>
							</div>
						</li>			
					@endforeach
						</ol>
					</div>
				</div>
			<!--END COMMENTS OUTPUT -->			
		</div>
	</div>
</div>	

