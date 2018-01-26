{$add_script = "
	<script>
	$(function() {
	$( '#slider-range' ).slider({
	range: true,
	min: {$min_price},
	max: {$max_price},
	values: [ {$filter_min_price}, {$filter_max_price} ],
	slide: function( event, ui ) {
	$( '#price_range' ).val( ui.values[ 0 ] + ' грн' + ' - ' + ui.values[ 1 ] + ' грн' );
	}
	});
	$( '#price_range' ).val( $( '#slider-range' ).slider( 'values', 0 ) + ' грн' +
	' - ' + $( '#slider-range' ).slider( 'values', 1 ) + ' грн' );
	});
	</script>
" scope="parent"}

<section id="products" class="catalog-page">
	<div class="container">
		<div class="row">
			<div id="path" class="col-lg-12">
				<a href="./">{if $language->id == 2}Головна{elseif $language->id == 4}Home{else}Главная{/if}</a> {if $category}
				{foreach from=$category->path item=cat} / <a href="catalog/{$cat->url}">{if $cat->visible_name}{$cat->visible_name|escape}{else}{$cat->name|escape}{/if}</a>{/foreach}
				{if $brand}/ <a href="catalog/{$cat->url}/{$brand->url}">{$brand->name|escape}</a>{/if}
				{elseif $brand}/ <a href="brands/{$brand->url}">{$brand->name|escape}</a>
				{elseif $keyword}/ {if $language->id == 2}Пошук{elseif $language->id == 4}Search{else}Поиск{/if} {$keyword|escape}{/if}
			</div>
			
			{if $keyword}
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			{if $products|count>2}
				<div class="sort pull-right">
				<select onchange="location = this.value+'#products';">
					<option value="{url sort=position}" {if $sort=='position'} selected{/if}>{if $language->id == 2}Сортировать по умолчанию{elseif $language->id == 4}Sort by default{else}Сортировать по умолчанию{/if}</option>
					<option value="{url sort=name}" {if $sort=='name'} selected{/if}>{if $language->id == 2}Назвою{elseif $language->id == 4}Name{else}Названию{/if}</option>
					<option value="{url sort=price_asc}" {if $sort=='price_asc'} selected{/if}>{if $language->id == 2}Від дорогих до дешевих{elseif $language->id == 4}From expensive to cheap{else}От дорогих к дешевым{/if}</option>
					<option value="{url sort=price_desc}" {if $sort=='price_desc'} selected{/if}>{if $language->id == 2}Від дешевих до дорогих{elseif $language->id == 4}From cheap to expensive{else}От дешевых к дорогим{/if}</option>
				</select>
				</div>
			{/if}
			</div>
			
			{if $products}
			<div class="products-list">
			{foreach $products as $product}
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">{include file='tpl_products_block.tpl'}</div>
			{/foreach}
			</div>
			
			<div class="col-lg-12">
			{include file='pagination.tpl'}
			</div>
			
			{else}<h4 style='padding:50px 20px;'>Товаров по запросу "{$keyword|escape}" не найдено!</h4>{/if}

			{else}
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				{if $features}
				<form method="get" action="{$smarty.server.SCRIPT_URL}#products">
					<div id="features-list" class="hidden-xs">
						
						<input type="text" name="price_range" id="price_range" value="" readonly>
						
						
						<div id="slider-range"></div>
						
						<div class="filter-button">
							<input type="submit" value="{if $language->id == 2}Фільтрувати{elseif $language->id == 4}Filter{else}Фильтровать{/if}">
						</div>
					
						{foreach $features as $f}
						{if $f->language_id == $language->id} 
						<div class="feature_name" data-feature="{$f->id}">
							{$f->name}
						</div>
						<div class="feature_values">
							<ul>
								{foreach $f->options as $k=>$o}
								<li>
									<label>
										<input type="checkbox" name="{$f->id}[]" onchange="submit(this.form);" {if $filter_features.{$f->id} && in_array($o->value,$filter_features.{$f->id})}checked="checked"{/if} value="{$o->value|escape}" />{$o->value|escape}
									</label>
								</li>
								{/foreach}
							</ul>
						</div>
						{/if}
						{/foreach}
						
						<div class="feature_name">
							{if $language->id == 2}Кольори{elseif $language->id == 4}Colors{else}Цвета{/if}
						</div>
						<div class="feature_values">
							<ul class="colors-filter">
								{foreach $products_colors as $color}
								{if $color}
								<li>
									<label {if $filter_colors && in_array($color, $filter_colors)}class="sel"{/if}>
										<input type="checkbox" name="colors[]" onchange="submit(this.form);" value="{$color}" {if $filter_colors && in_array($color, $filter_colors)}checked="checked"{/if} /><span style="background:#{$color};"></span><span class="check"><i class="fa fa-check" aria-hidden="true"></i></span>
									</label>
								</li>
								{/if}
								{/foreach}
							</ul>
						</div>
					</div>
				</form>
				{else}
				<div class="left-categories">
					{function name=left_menu}
					{if $categories}
					<ul class="{if $level==0}tree {/if}menu-level menu-level-{$level}">
					{foreach $categories as $c}
						{* Показываем только видимые категории *}
						{if $c->visible}
						<li>
							<a {if $category->id == $c->id}class="selected"{/if} href="catalog/{$c->url}" data-category="{$c->id}">{if $c->visible_name}{$c->visible_name|escape}{else}{$c->name|escape}{/if}</a>
							{left_menu categories=$c->subcategories level=$level+1}
						</li>
						{/if}
					{/foreach}
					</ul>
					{/if}
					{/function}
					
				</div>			
				{/if}
			</div>
			<div class="col-lg-9 col-md-8 col-sm-9 col-xs-12">
				<div class="row">
					<div class="col-lg-12 col-xs-12">
					{if $products|count>2}
						<div class="sort pull-right">
						<select onchange="location = this.value+'#products';">
							<option value="{url sort=position}" {if $sort=='position'} selected{/if}>{if $language->id == 2}Сортировать по умолчанию{elseif $language->id == 4}Sort by default{else}Сортировать по умолчанию{/if}</option>
							<option value="{url sort=name}" {if $sort=='name'} selected{/if}>{if $language->id == 2}Назвою{elseif $language->id == 4}Name{else}Названию{/if}</option>
							<option value="{url sort=price_asc}" {if $sort=='price_asc'} selected{/if}>{if $language->id == 2}Від дорогих до дешевих{elseif $language->id == 4}From expensive to cheap{else}От дорогих к дешевым{/if}</option>
							<option value="{url sort=price_desc}" {if $sort=='price_desc'} selected{/if}>{if $language->id == 2}Від дешевих до дорогих{elseif $language->id == 4}From cheap to expensive{else}От дешевых к дорогим{/if}</option>
						</select>
						</div>
					{/if}
					</div>
					
					{if $products}
					<div class="products-list">
					{foreach $products as $product}
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">{include file='tpl_products_block.tpl'}</div>
					{/foreach}
					</div>
					
					<div class="col-lg-12 col-md-12 col-xs-12">
					{include file='pagination.tpl'}
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						{$category->description}
					</div>
					
					{else}<h4 style='padding:50px 20px;'>{if $language->id == 2}Товарів нема{elseif $language->id == 4}No products{else}Товаров нет{/if}</h4>{/if}
				</div>
			</div>
			{/if}
		</div>
	</div>
</section>