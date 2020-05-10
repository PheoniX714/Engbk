{* Страница товара *}

{* Канонический адрес страницы *}
{$canonical="/{$page->url}" scope=parent}

<div id="comments">
	
	<form class="comment_form" method="post">
		<div class="cart-box order-data"> 
			<div class="row">
				<div class="col-md-12">
					<h3>Оставьте отзыв о нашей работе</h3>
				</div>

				<div class="form cart_form">         
					{if $error}
					<div class="alert alert-danger" style="display:block;clear:both;">
						{if $error=='captcha'}
						Неверно введена капча
						{elseif $error=='empty_name'}
						Введите имя
						{elseif $error=='empty_email'}
						Введите email
						{elseif $error=='empty_comment'}
						Введите текст отзыва
						{/if}
					</div>
					{/if}
					
					<div class="col-md-3 order-data-label">
						<label>Имя<span>*</span></label>
					</div>
					<div class="col-md-6 order-data-input">
						<input class="form-control" type="text" name="name" value="{$comment_name}"/>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-3 order-data-label">
						<label>Отзыв<span>*</span></label>
					</div>
					<div class="col-md-6 order-data-input">
						<textarea class="form-control" id="comment_text" name="text">{$comment_text}</textarea>
					</div>
					<div class="clear"></div>
					
					<div class="col-md-12 order-data-captcha">
						<div class="captcha"><img src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/></div> 
						<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>
					</div>

					<div class="col-md-12">
						<input type="submit" name="comment" class="button" value="Оставить отзыв">
					</div>
					
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>
	</form>
	<!--Форма отправления комментария-->

	<div id="com-list" class="col-md-12 comments">
	
		{if $comments}
		<ul class="comment_list">
			{foreach $comments as $comment}
			<a name="comment_{$comment->id}"></a>
			<li>
				<!-- Имя и дата комментария-->
				<div class="comment_header">	
					{$comment->name|escape} - <i>{$comment->date|date}</i>
				</div>
				<!-- Имя и дата комментария (The End)-->
				
				<!-- Комментарий -->
				{$comment->text|escape|nl2br}
				<!-- Комментарий (The End)-->
				
				{if $answers[$comment->id]->text}
				<div class="answer">
					<div class="a-title">
						Ответ администратора
					</div>
					<div class="a-text">
						{$answers[$comment->id]->text}
					</div>
				</div>
				{/if}
			</li>
			{/foreach}
		</ul>
		<!-- Список с комментариями (The End)-->
		{else}
		<p>
			Отзывов пока нет
		</p>
		{/if}
			
		{include file='pagination-comments.tpl'}
	</div>
</div>