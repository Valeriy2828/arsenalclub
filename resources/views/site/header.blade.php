<div class="top-menu">
	@if(isset($menu))	
		<ul>
			<nav class="cl-effect-5">	
			@foreach($menu as $item)
				<li><a class="active" href="{{ url($item['alias']) }}"><span data-hover="{{ $item['title'] }}">{{ $item['title'] }}</span></a></li> 
			@endforeach
				<li>
					<div class="user-log">
						@if(!auth()->user())
							<a class="active" id="log"><span onclick="dis('block')" data-hover="Регистрация">Регистрация</span><span style="padding: 0px 15px;">&nbsp;</span></a>
							<a class="active" id="log"> <span onclick="show('block')" data-hover="Вход">Вход</span></a>					
							<!--<a href="{{url("/login/google")}}"> Google</a-->
						@else
							<a><span id="user-name" data-hover="{{ $user->name  }}">{{ $user->name  }}</span><span style="padding: 0px 5px;">&nbsp;</span></a>	
							<a class="active" href="/logout"><span data-hover="Выход">Выход</span></a>
						@endif
					</div>
				</li>
			</nav>
		</ul>
	
	@endif           
	
</div>

<!-- модальное окно входа-->

<div id="filter" onclick="show('none')"></div>
<div id="modalForm">
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panele panel-default">
                <div class="panel-head">ВХОД</div>
                <div class="panel-bodi">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
						<div id="cross" onclick="show('none')">&times</div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label style="left: -10px;" id="mail" for="email" class="col-md-4 control-label">Электронная почта</label>

                            <div class="col-md-6">
                                <input id="post" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label style="left: -10px;" id="pass" for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>																			
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> <strong>Запомнить меня</strong>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="login-group">
                            <div class="col-md-18 text-center">
                                <button type="submit" class="log">
                                    <i class="fa fa-btn fa-sign-in"></i> Войти
                                </button>
                                <a id="forgot" class="point" onclick="reset('block')">Забыли свой пароль?</a>
                            </div>
                        </div>
						
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--конец модального окна входа -->

<!-- модальное окно регистрации -->

<div id="filterDark" onclick="dis('none')"></div>
<div id="modalreg">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panele panel-default">
					<div class="panel-head">Регистрация</div>
					<div class="panel-bodi">
						<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
							{{ csrf_field() }}
							<div id="cros" onclick="dis('none')">&times</div>
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label style="left: -10px;" id="mail" for="name" class="col-md-4 control-label">Имя</label>

								<div class="col-md-6">
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label style="left: -10px;" id="mail" for="email" class="col-md-4 control-label">Электронная почта</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label style="left: -10px;" id="mail" for="password" class="col-md-4 control-label">Пароль</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password">

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<label style="left: -10px;" id="mail" for="password-confirm" class="col-md-4 control-label">Подтвердить Пароль</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation">

									@if ($errors->has('password_confirmation'))
										<span class="help-block">
											<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
									@endif
								</div>
							</div>											
							<div class="form-group">
								<div class="col-md-12 text-center">
									<button type="submit" class="reg">
										<i class="fa fa-btn fa-user"></i> Зарегистрироваться
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!--конец модального окна регистрации -->


<!--модальное окно сброса пароля -->
<div id="filterReset" onclick="reset('none')"></div>
<div id="modalreset">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">           
			<div class="panel-head">Сброс пароля</div>
			<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif

				<form class="form-horizont" role="form" method="POST" action="{{ url('/password/email') }}">
					{{ csrf_field() }}
					<div id="cros" onclick="reset('none')">&times</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" id="mail-post" class="col-md-4 control-label">Электронная почта</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn-btn">
								<i class="fa fa-btn fa-envelope"></i> Ссылка сброса пароля
							</button>
						</div>
					</div>
				</form>
			</div>           
        </div>
    </div>
</div>
</div>
<!--конец модального окна сброса пароля -->


<!-- сессия и ошибки к форме -->
 @if(session('status'))<!-- доступ к сессии -->
	  <div class="alert alert-success"><!-- класс ,инфо на зеленом фоне -->
			{{ session('status') }}<!-- статус сессии -->
	  </div>
  @endif
  
  @if(count($errors))<!-- подсчитываем сколько ошибок -->
	  <div class=" alert alert-danger"><!-- класс ,инфо на красном фоне -->
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li><!-- список ошибок -->
				@endforeach
			</ul>
	  </div>
  @endif