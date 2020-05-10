{* Список записей блога *}

{* Канонический адрес страницы *}
{$canonical="/news" scope=parent}

{if $page->image}
<div class="top-banner hidden-xs">
	<img src="files/pages/{$page->image}" alt="" title="">
</div>
{/if}

<div class="o-title" style="margin:20px 0 20px;">
	<h2 style="margin-bottom:30px; font-weight:bold;">Наши обзоры</h2>
	<div class="sep"></div>
</div>

<!-- Статьи /-->
<div id="news">
	{foreach $posts as $post}
	<div class="col-xs-12 col-sm-6 col-md-4">
		<div class="n-img"><a data-post="{$post->id}" href="news/{$post->url}"><img src="files/news/{$post->image|escape}" alt="{$post->name|escape}" title="{$post->name|escape}"></a></div>
		<h2><a data-post="{$post->id}" href="news/{$post->url}">{$post->name|escape}</a></h2>
		<div class="n-date">{$post->date|date}</div>
		<div class="n-annotation">{$post->annotation}</div>
		<div class="n-more"><a data-post="{$post->id}" href="news/{$post->url}">Читать дальше </a></div>
	</div>
	{/foreach}
</div>
<!-- Статьи #End /-->    

{include file='pagination.tpl'}
          