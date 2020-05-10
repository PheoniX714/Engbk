{* Страница отдельной записи блога *}

{* Канонический адрес страницы *}
{$canonical="/news/{$post->url}" scope=parent}

<div class="top-banner">
	<img src="templates/{$settings->theme|escape}/img/top-banner1.jpg" alt="" title="">
</div>

<!-- Заголовок /-->
<h2 data-post="{$post->id}" style="font-size:18px ;margin: 20px 0 10px">{$post->name|escape}</h2>
<p style="margin-bottom: 30px">{$post->date|date}</p>

<!-- Тело поста /-->
<div class="post">
	{$post->text}
</div>
