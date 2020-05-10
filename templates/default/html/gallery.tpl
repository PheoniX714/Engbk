{* Список товаров *}

{* Описание страницы (если задана) *}
{$page->body}

{if $current_page_num==1}
{* Описание категории *}
{$category->description}
{/if}
<div class="col-md-12 hidden-xs hidden-sm gal-title-box">
	<div class="col-md-9 gal-title">
		<div class="gal-title">
			ФОТО ОБЪЕКТОВ
		</div>
	</div>
	<div class="col-md-3 gal-cat-title">
		<div class="gal-cat-title">
			ТИП ОБЪЕКТОВ
		</div>
	</div>
</div>
<div class="col-md-9" style="padding:0 10px 0 15px;">
	{if $pictures}
	<!-- Список товаров-->
	<div class="row pictures">
		{foreach $pictures as $picture}
		<!-- Товар-->
		<div class="col-md-3 product-box">
			<div class="product">
				<a href="files/gallery/{$picture->filename}" class="zoom" rel="group"><img src="files/gallery/{$picture->filename}" /></a>
			</div>
		</div>
		<!-- Товар (The End)-->
		{/foreach}
	</div>
	
	<div class="col-md-12 pagination-block">
		{include file='pagination.tpl'}
	</div>
	{else}
		Изображения не найдены
	{/if}
</div>
<div class="col-md-3">
	<div id="gallery-categories" class="row">
		{* Рекурсивная функция вывода дерева категорий *}
		{if $categories}
		<div class="col-md-12"><a href="gallery" {if $category->id}{else}class="selected"{/if}>Все изображения</a></div>
		{function name=category_select level=0}
			{foreach from=$categories item=c}
				<div class="col-md-12"><a href="album/{$c->url}" {if $c->id == $selected_id}class="selected"{/if}>{$c->name|escape}</a></div>
				{category_select categories=$c->subcategories selected_id=$selected_id  level=$level+1}
			{/foreach}
		{/function}
		{category_select categories=$categories selected_id=$category->id}
		{/if}
	</div>
</div>
<!--Каталог товаров-->

<!--Каталог товаров (The End)-->

{* Увеличитель картинок *}
{literal}
<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

<script>
$(function() {
	// Зум картинок
	$("a.zoom").fancybox({
		prevEffect	: 'fade',
		nextEffect	: 'fade'});
	});
</script>
{/literal}