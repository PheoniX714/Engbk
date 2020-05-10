{* Страница с формой обратной связи *}

{* Канонический адрес страницы *}
{$canonical="/{$page->url}" scope='root'}

<div class="text-block">
	<h2>{$page->name}</h2>
	{$page->body}
</div>

{*
{if $message_sent}
<div class="cart-box order-data"> 
	<div class="row">
		<div class="form cart_form">         
			<div class="alert alert-success">
				Ваше сообщение отправлено
			</div>
		</div>
	</div>
</div>
{else}
<form class="form feedback_form" method="post">
<div class="cart-box order-data"> 
	<div class="row">
		<div class="form cart_form">         
			{if $error}
			<div class="alert alert-danger">
				{if $error=='captcha'}
				Неверно введена капча
				{elseif $error=='empty_name'}
				Введите имя
				{elseif $error=='empty_phone'}
				Введите номер телефона
				{elseif $error=='empty_email'}
				Введите email
				{elseif $error=='empty_text'}
				Введите сообщение
				{/if}
			</div>
			{/if}
			<div class="col-md-3 order-data-label">
				<label>ФИО<span>*</span></label>
			</div>
			<div class="col-md-6 order-data-input">
				<input class="form-control" name="name" type="text" value="{$name|escape}"/>
			</div>
			<div class="clear"></div>
			
			<div class="col-md-3 order-data-label">
				<label>E-mail<span>*</span></label>
			</div>
			<div class="col-md-6 order-data-input">
				<input class="form-control" name="email" type="text" value="{$email|escape}" />
			</div>
			<div class="clear"></div>
			
			<div class="col-md-3 order-data-label">
				<label>Телефон<span>*</span></label>
			</div>
			<div class="col-md-6 order-data-input">
				<input class="form-control" name="phone" type="text" value="{$phone|escape}" />
			</div>
			<div class="clear"></div>

			<div class="col-md-3 order-data-label">
				<label>Ваше сообщение<span>*</span></label>
			</div>
			<div class="col-md-6 order-data-input">
				<textarea class="comment_textarea col-xs-12 col-md-12" id="comment_text" value="{$message|escape}" name="message" data-format=".+" data-notice="Введите комментарий">{$message}</textarea>
			</div>
			<div class="clear"></div>		
			
			<div class="col-md-9 col-md-offset-3 order-data-captcha">
				<div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/></div> 
				<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>
				<input type="submit" name="feedback" class="button" value="Отправить">
			</div>
			
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
</form>
{/if}
*}