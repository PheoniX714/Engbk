{* Title *}
{$meta_title='Список товаров' scope=parent}
{$sm_groupe = 'catalog' scope=parent}
{$sm_item = 'products' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/products.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Каталог товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Каталог товаров</li>
	</ol>
</section>

<section class="content">
<!-- Main row -->
  <div class="row">
	<!-- Left col -->
	<form id="list_form" method="post">
	<div class="col-md-10">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-th-list"></i>
		  <h3 class="box-title" style="line-height:1.5">Список товаров ({$products_count})</h3>
		  <a href="index.php?module=ProductAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить товар</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="{$smarty.session.id}">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th sortable-table" id="functional-table">
                <tbody>
				<tr>
					<th class="move-cell"></th>
					<th class="checkbox-cell ln-inherit">
						<input type="checkbox" class="minimal checkbox-toggle">
					</th>
					<th class="id-cell">ID</th>
					<!-- <th class="sku-cell">Артикул</th> -->
					<th>Товар</th>
					<th>Цена</th>
					<th class="actions-cell">Действия</th>
				</tr>
				{if $products}
                {foreach $products as $product}
				<tr class="c_item">
					<td class="move-cell">
						<input type="hidden" name="positions[{$product->id}]" value="{$product->position}">
						<div class="move_zone"><i class="fa fa-bars"></i></div>
					</td>
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="{$product->id|escape}">
					</td>
					<td class="id-cell">
						{$product->id|escape}
					</td>
					<!-- <td class="sku-cell">
						{$product->sku|escape}
					</td> -->
					<td class="product-cell">
						{$image = $product->images|@first}
						{if $image}
						<a href="{url module=ProductAdmin id=$product->id}"><img src="{$image->filename|escape|resize:50:50}" /></a>
						{/if}
						<a href="{url module=ProductAdmin id=$product->id}">{$product->name|escape}</a>
					</td>
					<td class="price-cell">
						<ul>
						{foreach $product->variants as $variant}
							<li {if !$variant@first}class="variant" style="display:none;"{/if}>
								<div class="variant-name"><i>{$variant->name|escape|truncate:20:'…':true:true}</i></div>
								<input style="max-width:90px" type="text" name="price[{$variant->id}]" value="{$variant->price}" class="form-control" />&nbsp;<label>{$currency->sign}</label>
								<input class="form-control" type="text" name="stock[{$variant->id}]" value="{if $variant->infinity}∞{else}{$variant->stock}{/if}" style="max-width:60px;min-width:60px" />&nbsp;<label>{$settings->units}</label>
							</li>
						{/foreach}
						</ul>
					</td>
					<td class="actions-cell">
						<button class="featured btn btn-sm {if !$product->featured}btn-default{else}btn-warning act{/if} btn-flat btn-actions" ><i class="fa fa-fire"></i></button>						
						<button class="enable btn btn-sm btn-flat {if !$product->visible}btn-default{else}btn-success act{/if} btn-actions" ><i class="fa fa-lightbulb-o"></i></button>
						<a href="../products/{$product->url}" class="btn btn-sm btn-primary btn-flat btn-actions preview" target="_blank"><i class="fa fa-share"></i></a>
						<a href="{url module=ProductAdmin id=$product->id }" class="btn btn-sm btn-flat btn-primary btn-actions"><i class="fa fa-pencil"></i></a>
						<button class="delete btn btn-sm btn-flat btn-danger btn-actions" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				{/foreach}
				{else}
				<tr>
					<td colspan="7">
						Товаров нет
					</td>
				</tr>
				{/if}
				</tbody>
			</table>
			<div class="col-lg-12">
			{include file='pagination.tpl'}
			</div>
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  
	  <div class="row">
		<div class="form-group col-lg-3">
			<select id="action" class="form-control" name="action">
				<option value="enable">Сделать видимыми</option>
				<option value="disable">Сделать невидимыми</option>
				<option value="set_featured">Сделать рекомендуемым</option>
				<option value="unset_featured">Отменить рекомендуемый</option>
				<option value="duplicate">Создать дубликат</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
		  
		<div class="col-lg-2">
			<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
		</div>
	  </div>
	</div>
	</form>
	<div class="col-md-2">
		<div class="row">
		<form method="get">
			<input type="hidden" name="module" value="ProductsAdmin">
			<div class="col-md-12" id="search">
				<label>Поиск</label>
				<div class="form-group">
					<div class="input-group">
						<input class="form-control" id="appendedInputButton" name="keyword" type="text" value="{$keyword|escape}">
						<span class="input-group-btn">
							<button class="btn btn-success btn-flat" type="submit" value=""><i class="fa fa-search"></i></button>
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<!-- Меню каталога -->
				<div id="catalog_menu" style="margin-bottom:20px;">
				{* Рекурсивная функция вывода дерева категорий *}
				{if $categories}
				<label>Фильтр по категории</label>
				<select class="form-control" name="category_id">
					<option value="" >Все товары</option>
				{function name=category_select level=0}
					{foreach from=$categories item=c}
						<option value="{$c->id}" {if $c->id == $selected_id}selected{/if}>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$c->name|escape}</option>
						{category_select categories=$c->subcategories selected_id=$selected_id  level=$level+1}
					{/foreach}
				{/function}
				{category_select categories=$categories selected_id=$category->id}
				</select>
				{/if}
				</div>
			</div>
			
			<div class="col-md-12">
				<!-- Меню каталога -->
				<div style="margin-bottom:20px;">
				<label>Фильтр по типу</label>
				<select class="form-control" name="filter">
					<option value="" >Все товары</option>
					<option value="featured" {if $filter == 'featured'}selected{/if}>Рекомендуемые</option>
					<option value="discounted" {if $filter == 'discounted'}selected{/if}>Со скидкой</option>
					<option value="visible" {if $filter == 'visible'}selected{/if}>Активные</option>
					<option value="hidden" {if $filter == 'hidden'}selected{/if}>Неактивные</option>
					<option value="in_stock" {if $filter == 'in_stock'}selected{/if}>Есть на складе</option>
					<option value="outofstock" {if $filter == 'outofstock'}selected{/if}>Отсутствующие на складе</option>
				</select>
				</div>
			</div>
			
			<div class="col-md-6">
				<a href="{url filter=null category_id=null keyword=null}" class="btn btn-block btn-danger btn-flat">Очистить</a>
			</div>
			<div class="col-md-6">
				<button type="submit" class="btn btn-block btn-success btn-flat">Фильтровать</button>
			</div>
			
		</form>
		</div>
	</div>
  </div>
</section>