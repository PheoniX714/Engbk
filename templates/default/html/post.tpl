{$og_type="article" scope="parent"}
{$og_image="{$config->root_url}/files/uploads/{$post->image}" scope="parent"}
{include file='slider.tpl'}

<section class="news-page">
	<div class="container">

		<div id="path">
			<a href="./">Главная</a> / <a href="./news">Публикации</a> / {$post->name|escape}
		</div>
		
		<div class="clear"></div>

		<div class="row news">
			<div class="col-lg-12">
				<div class="news-text">
					<h2>{$post->name|escape}</h2>
					<div class="post-annotation">{$post->text}</div>
				</div>
			</div>
		</div>
		
		{include file='pagination.tpl'}
	</div>
</section>