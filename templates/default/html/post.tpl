{$og_type="article" scope="parent"}
{$og_image="{$config->root_url}/files/uploads/{$post->image}" scope="parent"}

<section class="news-page">
	<div class="container">

		<div id="path">
			<a href="./">{if $language->id == 2}Головна{elseif $language->id == 4}Home{else}Главная{/if}</a> / <a href="./news">{if $language->id == 2}Блог{elseif $language->id == 4}Blog{else}Блог{/if}</a> / {$post->name|escape}
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
		
	</div>
</section>