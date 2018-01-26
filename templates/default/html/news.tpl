<section class="news-page">
	<div class="container">

		<div id="path">
			<a href="./">{if $language->id == 2}Головна{elseif $language->id == 4}Home{else}Главная{/if}</a> / {if $language->id == 2}Блог{elseif $language->id == 4}Blog{else}Блог{/if}
		</div>
		
		<div class="clear"></div>
		
		{foreach $posts as $post}
		<div class="row news">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="image">
					<a href="news/{$post->url}"><img src="files/uploads/{$post->image}" alt="{$post->name|escape}" /></a>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<div class="news-text">
					<h2><a href="news/{$post->url}">{$post->name|escape}</a></h2>
					<div class="post-annotation">{$post->annotation}</div>
					<div class="more"><a href="news/{$post->url}">{if $language->id == 2}Детальніше{elseif $language->id == 4}More{else}Подробнее{/if}</a></div>
				</div>
			</div>
		</div>
		{/foreach}
		
		{include file='pagination.tpl'}
	</div>
</section>