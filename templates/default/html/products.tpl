{$add_script = {include file='menu_script.tpl'} scope="parent"}

{include file='slider.tpl'}

<section id="products" class="catalog-page">
	<div class="container">
		
		<div id="path" class="col-lg-12">
			<a href="./">Главная</a> {if $category}
				{foreach from=$category->path item=cat} / <a href="catalog/{$cat->url}">{if $cat->visible_name}{$cat->visible_name|escape}{else}{$cat->name|escape}{/if}</a>{/foreach}
				{if $brand}/ <a href="catalog/{$cat->url}/{$brand->url}">{$brand->name|escape}</a>{/if}
			{elseif $brand}/ <a href="brands/{$brand->url}">{$brand->name|escape}</a>
			{elseif $keyword}/ Поиск {$keyword|escape}{/if}
		</div>
		
		{if $keyword}
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		{if $products|count>2}
			<div class="sort pull-right">
			<select onchange="location = this.value+'#products';">
				<option value="{url sort=position}" {if $sort=='position'} selected{/if}>Сортировать по</option>
				<option value="{url sort=name}" {if $sort=='name'} selected{/if}>Названию</option>
				<option value="{url sort=price}" {if $sort=='price'} selected{/if}>Цене</option>
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
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			{if $features}
			<form method="get" action="{$smarty.server.SCRIPT_URL}#products">
				{*<div id="features-list">
					{foreach $features as $f} 
					{if $f->language_id == $language->id} 
					<ul class="tree menu-level menu-level-0">
						<li>
						<span>{$f->name}</span>

						<ul class="menu-level menu-level-1">
							{foreach $f->options as $k=>$o}
							<li>
								<label>
									<input type="checkbox" name="{$f->id}[]" onchange="submit(this.form);" {if $filter_features.{$f->id} && in_array($o->value,$filter_features.{$f->id})}checked="checked"{/if} value="{$o->value|escape}" />{$o->value|escape}
								</label>
							</li>
							{/foreach}
						</ul>
						</li>
					</ul>
					{/if}
					{/foreach}
				</div>*}
				<div id="features-list" class="hidden-xs">
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
				
				{if in_array($category->id, $wc)}
				{left_menu categories=$categories_women level=0}
				{left_menu categories=$categories_1 level=0}
				{left_menu categories=$categories_2 level=0}	
				{elseif in_array($category->id, $mc)}
				{left_menu categories=$categories_men level=0}
				{left_menu categories=$categories_1 level=0}
				{left_menu categories=$categories_2 level=0}	
				{else}
				{left_menu categories=$categories level=0}	
				{/if}
			</div>			
			{/if}
		</div>
		<div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-lg-12 col-xs-12">
				{if $products|count>2}
					<div class="sort pull-right">
					<select onchange="location = this.value+'#products';">
						<option value="{url sort=position}" {if $sort=='position'} selected{/if}>Сортировать по умолчанию</option>
						<option value="{url sort=name}" {if $sort=='name'} selected{/if}>Названию</option>
						<option value="{url sort=price_asc}" {if $sort=='price_asc'} selected{/if}>От дорогих к дешевым</option>
						<option value="{url sort=price_desc}" {if $sort=='price_desc'} selected{/if}>От дешевых к дорогим</option>
					</select>
					</div>
				{/if}
				</div>
				
				{if $products}
				<div class="products-list">
				{foreach $products as $product}
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">{include file='tpl_products_block.tpl'}</div>
				{/foreach}
				</div>
				
				<div class="col-lg-12 col-md-12 col-xs-12">
				{include file='pagination.tpl'}
				</div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					{$category->description}
				</div>
				
				{else}<h4 style='padding:50px 20px;'>Товаров нет</h4>{/if}
			</div>
		</div>
		{/if}
	</div>
</section>