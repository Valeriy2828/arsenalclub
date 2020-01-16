<div class="footer" id="contact">
		<div class="container">
			<div class="col-md-5 contact-section">
				<h4>Контактная форма</h4>
					<form action="{{ route('home') }}" method="post">
						<input type="text" class="text" name="name" value="Имя *" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Имя';}">
						<input type="text" class="text" name="email" value="Почта *" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Почта';}">
						<textarea name="text" onfocus="if(this.value == 'Message') this.value='';"  placeholder="Сообщение *"></textarea>
						<input type="submit" value="Отправить">
						
						{{ csrf_field() }}<!-- чтобы ошибка токена не появлялась -->
						
					</form> 	
			</div>
			<div class="col-md-7 follow-us">
				<h4>Следите за нами</h4>
				<div class="social-icons">
					<i class="facebook"></i>
					<i class="twitter"></i>
					<i class="pinterest"></i>
					<i class="googlepluse"></i>
				</div>
				<p>Помогите нам стать лучше - заполните, пожалуйста, форму и мы прислушаемся к каждой рекомендации!
					И если вы вдруг нашли ошибку или хотите сделать правку - пишите не раздумывая!!!</p>
				<div class="copyright">
					<p>2018 &nbsp Разработал  &nbsp Валерий Белевцов</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div>		
			<div class="col-md-12 politica-a text-center">
				<a href="{{ url('/politica') }}">политика конфицидиальности</a>
			<div>	
		</div>
</div>