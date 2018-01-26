{* Title *}
{if $product->id}
{$meta_title = $product->name scope=parent}
{else}
{$meta_title = 'Новый товар' scope=parent}
{/if}
{$sm_groupe = 'catalog' scope=parent}
{$sm_item = 'products' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	<link rel="stylesheet" href="./templates/js/plugins/colorpicker/bootstrap-colorpicker.min.css">
	<link href="templates/js/fileinput/fileinput.css" media="all" rel="stylesheet" type="text/css" />
' scope=parent}

{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
	
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script src="./templates/js/autocomplete/jquery.autocomplete-min.js"></script>
	<script src="./templates/js/modules/product.js"></script>
' scope=parent}

<section class="content-header">
	<h1>{if $product->id}{$product->name}{else}Новый товар{/if}</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=ProductsAdmin">Каталог товаров</a></li>
        <li class="active">{if $product->id}{$product->name}{else}Новый товар{/if}</li>
	</ol>
</section>

<section class="content">

{if $message_success}
<!-- Системное сообщение -->
<div class="alert alert-success">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
	<b>{if $message_success=='added'}Товар добавлен{elseif $message_success=='updated'}Товар изменен{else}{$message_success|escape}{/if}</b>
	
	<a class="btn btn-success btn-xs pull-right" style="margin-right:20px;" href="{url module=ProductAdmin id=null}"><i class="fa fa-plus"></i> Добавить новый товар</a>
</div>
<!-- Системное сообщение (The End)-->
{/if}	

{if $message_error}
<!-- Системное сообщение -->
<div class="alert alert-danger">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
	<b>{if $message_error=='url_exists'}Товар с таким адресом уже существует{elseif $message_error=='empty_name'}Введите название{else}{$message_error|escape}{/if}</b>
</div>
<!-- Системное сообщение (The End)-->
{/if}

<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">

	<div class="row">
		<div class="col-lg-12">
			<div class="box box-success"> 
				<div class="box-header">
				  <i class="fa fa-edit"></i>
				  <h3 class="box-title" style="line-height:1.5">{if $product->id}Редактирование товара{else}Создание товара{/if}</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" value="Сохранить">
				  <select id="language_id" class="form-control pull-right" style="width:150px; height:30px; padding: 4px 12px; margin-right:15px; cursor:pointer;" onchange="if (this.value) window.location.href=this.value" {if !$product->id}disabled{/if}>
					{foreach $languages as $l}
						<option value='{url module=ProductAdmin id=$product->id language_id=$l->id return=null}' {if $language_id == $l->id}selected{/if}>{$l->name|escape}</option>
						{if !$product->id}{break}{/if}
					{/foreach}
				  </select>
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
				  <!-- Custom Tabs -->
				  <div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#main" data-toggle="tab">Описание товара</a></li>
						<li><a href="#images" data-toggle="tab">Изображения</a></li>
						<li><a href="#product-group" data-toggle="tab">Группа товаров</a></li>
						<li><a href="#related-products" data-toggle="tab">Похожие товары</a></li>
						<li><a href="#features" data-toggle="tab">Свойства</a></li>
						<li><a href="#seo" data-toggle="tab">SEO</a></li>
					</ul>
				  </div>
				  <!-- nav-tabs-custom -->
	
				  <!-- Custom Tabs -->
				  <div class="product-edit-page">
					<div class="tab-content">
					  <div class="tab-pane active" id="main">
						<div class="col-lg-4">
							<label for="name">Название товара в админ панели</label>
							<input type="text" id="name" class="form-control" name="name" value="{$product->name|escape}" />
							<input name="id" type="hidden" value="{$product->id|escape}"/>
							{if $language_id != 1}<input name="language_id" type="hidden" value="{$language_id|escape}"/>{/if}
						</div>
						<div class="col-lg-4">
							<label for="visible_name">Название товара на сайте</label>
							<input type="text" id="visible_name" class="form-control" name="visible_name" value="{$product->visible_name|escape}" />
						</div>
						<div class="col-lg-1">
							<div class="checkbox" style="margin-top:31px;">
								<label>
									<input type="checkbox" name="visible" class="minimal" {if $product->visible}checked{/if} {if $language_id != 1}disabled{/if}>
									Активен
								</label>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="checkbox" style="margin-top:31px;">
								<label>
									<input type="checkbox" name="featured" class="minimal" {if $product->featured}checked{/if} {if $language_id != 1}disabled{/if}>
									Рекомендуемый
								</label>
							</div>
						</div>
						
						<div class="clear" style="margin-bottom:20px;"></div>
						
						<div class="col-lg-8">
							<label for="functional-table">Варианты товара</label>
							<table class="table table-striped table-bordered table-hover tabled-view black-th variants_table sortable-table" id="functional-table">
							<tbody id="variants">
								<tr>
									<th class="move-cell"></th>
									<th class="name-cell">Название варианта</th>
									<th>Артикул</th>
									<th>Цена</th>
									<th>Старая цена</th>
									<th>Кол-во</th>
									<th class="actions-cell" style="width:100px;">Действия</th>
								</tr>
								{foreach from=$product_variants item=variant name=variants}
								<tr class="c_item">
									<td class="move-cell">
										<input name="variants[id][]" type="hidden" value="{$variant->id|escape}" />
										 {if $language_id == 1}<div class="move_zone"><i class="fa fa-bars"></i></div>{/if}
									</td>
									<td class="name-cell">
										<input name="variants[name][]" type="text" class="form-control" value="{$variant->name|escape}" />
									</td>
									<td>
										<input name="variants[sku][]" type="text" class="form-control" value="{$variant->sku|escape}" {if $language_id != 1}disabled{/if} />
									</td>
									<td class="price-cell">
										<input name="variants[price][]" type="text" class="form-control" value="{$variant->price|escape}" {if $language_id != 1}disabled{/if} />
									</td>
									<td class="price-cell">
										<input name="variants[compare_price][]" type="text" class="form-control" value="{$variant->compare_price|escape}" {if $language_id != 1}disabled{/if} />
									</td>
									<td>
										<div><div style="width:50px; display:inline-block; margin-right:10px;"><input name="variants[stock][]" class="form-control" type="text" value="{if $variant->infinity || $variant->stock == ''}∞{else}{$variant->stock|escape}{/if}" {if $language_id != 1}disabled{/if} /></div><div style="display:inline-block"> {$settings->units}</div></div>
									</td>
									<td class="actions-cell" style="width:100px;">
										{if $smarty.foreach.variants.first}
										<button type="button" class="btn btn-sm btn-flat btn-success btn-actions" id="add_variant" {if $language_id != 1}disabled{/if}><i class="fa fa-plus"></i></button>
										<button type="button" class="btn btn-sm btn-flat btn-danger btn-actions" style="display:none;" id="del_variant" {if $language_id != 1}disabled{/if} ><i class="fa fa-trash-o"></i></button>
										{else}
										<button type="button" class="btn btn-sm btn-flat btn-danger btn-actions" id="del_variant" {if $language_id != 1}disabled{/if} ><i class="fa fa-trash-o"></i></button>
										{/if}
									</td>
										
								</tr>
								{/foreach}
							</tbody>
							</table>
						</div>
						
						<div id="product_categories" class="col-lg-4">
							<label for="menu_id">Категории</label>
							<div>
								<ul class="clear-list">
									{foreach $product_categories as $product_category name=categories}
									<li>
										<div class="row">
											<div class="col-lg-10">
												<select id="menu_id" class="form-control" name="categories[]" {if $language_id != 1}disabled{/if}>
													{function name=category_select level=0}
													{foreach $categories as $category}
														<option value='{$category->id}' {if $category->id == $selected_id}selected{/if} category_name='{$category->name|escape}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name|escape}</option>
															{category_select categories=$category->subcategories selected_id=$selected_id  level=$level+1}
													{/foreach}
													{/function}
													{category_select categories=$categories selected_id=$product_category->id}
												</select>
											</div>
											<div class="col-lg-2">
												<button type="button" {if not $smarty.foreach.categories.first}style='display:none;'{/if} class="btn btn-sm btn-flat btn-success btn-actions add" {if $language_id != 1}disabled{/if}><i class="fa fa-plus"></i></button>
												<button type="button" {if $smarty.foreach.categories.first}style='display:none;'{/if} class="delete btn btn-sm btn-flat btn-danger btn-actions" {if $language_id != 1}disabled{/if}><i class="fa fa-minus"></i></button>
											</div>
										</div>
									</li>
								{/foreach}		
								</ul>
							</div>
						</div>
						
						{* Подключаем Tiny MCE *}
						{include file='editor/tinymce_init.tpl'}
						
						<div>
							<div class="col-md-12"><h4><b>Краткое описание</b></h4></div>
							<div class="col-md-12"><textarea name="annotation" rows="5" class="form-control editor_small">{$product->annotation|escape}</textarea></div>
							<div class="clear"></div>
						</div>
						
						
						<div>
							<div class="col-md-12"><h4><b>Описание товара</b></h4></div>
							<div class="col-md-12"><textarea name="body" rows="10" class="form-control editor_large">{$product->body|escape}</textarea></div>
						</div>
						<div class="clear"></div>
					  </div>
					  <!-- /.tab-pane -->
					  
					  <div class="tab-pane" id="images">
						<div class="col-lg-12">
							<div class="images-upload">
								<div class="form-group">
									<input type="file" name="new_images[]" multiple>
									<p class="help-block">Допустимые расширения файлов: <b>jpg, jpeg, png, gif</b>. Также допускается загрузка изображений находящихся в архиве формата <b>zip</b>. Рекомендуемый размер изображения: <b>до 1500px по большей стороне</b>.</p>
								</div>
							</div>
							<div class="images-list sortable-images">
								{foreach $product_images as $image}
								<div class="col-md-2 image-box">
									<div class="image">
										<img src="/files/originals/{$image->filename}">
										<div class="image-check"><input type="checkbox" name="check[]" class="im-check" value="{$image->id|escape}"></div>
										<div class="image-controls">
											<input name="positions[]" type="hidden" value="{$image->id|escape}" class="form-control" />
											<div class="move_zone"><i class="fa fa-arrows"></i></div>
											<div class="open-image"><a href="/files/originals/{$image->filename}" target="__blank"><i class="fa fa-eye"></i></a></div>
											<div class="delete-image" ><i class="fa fa-trash"></i></div>
										</div>
									</div>
								</div>
								{/foreach}
							</div>
							<div class="clear"></div>
							
							<div class="form-group col-md-2">
								<select id="action" class="form-control" name="action">
									<option value="">Выберите действие</option>
									<option value="delete">Удалить</option>
								</select>
							</div>
								  
							<div class="col-md-2">
								<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
							</div>
							<div class="col-md-2">
								<span class="btn btn-block btn-primary btn-flat select-all-images" ><i class="fa fa-check"></i> Выбрать все фото</span>
							</div>
						</div>
					  </div>
					  <!-- /.tab-pane -->
					  
					  <div class="tab-pane" id="features">
						<script>
						var categories_features = new Array();
						{foreach from=$categories_features key=c item=fs}
						categories_features[{$c}]  = Array({foreach from=$fs item=f}'{$f}', {/foreach}0);
						{/foreach}
						</script>
						
						<div class="block layer" {if !$categories}style='display:none;'{/if}>
							<div class="col-lg-4">
								<div class="prop_ul">
									{foreach $features as $feature}
										{assign var=feature_id value=$feature->id}
										<div class="form-group" feature_id={$feature_id}>
											<div class="row">
												<label class="col-lg-4">{$feature->name}: </label>
												<div class="col-lg-8">
													<input class="form-control" type="text" name=options[{$feature_id}] value="{$options.$feature_id->value|escape}" />
												</div>
											</div>
										</div>
									{/foreach}
								</div>
								<!-- Новые свойства -->
								<div class="new_features">
									<div id=new_feature class="form-group">
										<div class="row">
											<label class="property col-lg-4"><input type=text class="form-control" name=new_features_names[]></label>
											<div class="col-lg-8">
												<input class="form-control" type="text" name=new_features_values[] />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<button class="btn btn-success btn-flat" id="add_new_feature"><i class="fa fa-plus"></i> Добавить новое свойство</button>
							</div>
							
						</div>
					  </div>
					  
					  <div class="tab-pane" id="related-products">
							{literal}
							<style>
							.autocomplete-suggestions{
								background-color: #ffffff;
								overflow: hidden;
								border: 1px solid #e0e0e0;
								overflow-y: auto;
							}
							.autocomplete-suggestions .autocomplete-suggestion{cursor: default;}
							.autocomplete-suggestions .selected { background:#F0F0F0; }
							.autocomplete-suggestions div { padding:2px 5px; white-space:nowrap; }
							.autocomplete-suggestions strong { font-weight:normal; color:#3399FF; }
							#related_products{margin-bottom:10px;}
							.related_products{margin-bottom:10px;}
							</style>
							{/literal}
						
							<div class="col-lg-12"><input type=text name=related id='related_products' class="form-control input_autocomplete col-md-12" placeholder='Выберите товар чтобы добавить его'></div>
							
							<div class="col-lg-6">
								<div id=list class="sortable-list related_products">
									{foreach from=$related_products item=related_product}
									<div class="r-row">
										<div class="move_cell col-md-1">
											<div class="move_bars"><i class="fa fa-bars"></i></div>
										</div>
										<div class="image_cell col-md-2">
										<input type=hidden name=related_products[] value='{$related_product->id}'>
										<a href="{url id=$related_product->id}">
										<img class=product_icon src='{$related_product->images[0]->filename|resize:100:100}'>
										</a>
										</div>
										<div class="name_cell col-md-8">
										<a href="{url id=$related_product->id}">{$related_product->name}</a>
										</div>
										<div class="icons_cell col-md-1">
										<button class="btn btn-sm btn-danger delete btn-flat"><i class="fa fa-trash-o"></i></button>
										</div>
										<div class="clear"></div>
									</div>
									{/foreach}
									<div id="new_related_product" class="r-row" style='display:none;'>
										<div class="move_cell col-md-1">
											<div class="move_zone"><i class="fa fa-bars"></i></div>
										</div>
										<div class="image_cell col-md-2">
										<input type=hidden name=related_products[] value=''>
										<img class=product_icon src=''>
										</div>
										<div class="name_cell col-md-8">
										<a class="related_product_name" href=""></a>
										</div>
										<div class="icons_cell col-md-1">
										<button class="btn btn-sm btn-danger delete btn-flat"><i class="fa fa-trash-o"></i></button>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
					  </div>
					  
					  <div class="tab-pane" id="product-group" >
							<div class="col-lg-12">
								{if $product_group}
									<a href="{url module=ProductsGroupAdmin id=$product_group->group_id}" class="btn btn-sm btn-flat btn-primary" ><i class="fa fa-pencil"></i> Редактировать группу</a>
								{else}
									<a href="{url module=ProductsGroupAdmin id=null}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Создать группу</a>
								{/if}
							</div>
							<div class="col-lg-12"><h4><b>Дополнительные параметры товара для группы</b></h4></div>
							<div class="col-lg-3">
								<label for="color">Цвет товара</label>
								<input type="text" id="color" class="form-control my-colorpicker1 colorpicker-element" name="color" value="{$product->color|escape}">
							</div>
							
							
							<div class="clear"></div>
					  </div>
					  
					  <div class="tab-pane" id="seo">
						<div class="col-lg-4">
							<label for="url">Адрес</label>
							<input type="text" id="url" class="form-control" name="url" value="{$product->url|escape}" {if $language_id != 1}disabled{/if} />
						</div>
						<div class="col-lg-4">
							<label for="meta_title">Заголовок страницы</label>
							<input type="text" id="meta_title" class="form-control" name="meta_title" value="{$product->meta_title|escape}">
						</div>
						<div class="col-lg-12">
							<label for="meta_keywords">Ключевые слова</label>
							<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="{$product->meta_keywords|escape}">
						</div>
						<div class="col-lg-12">
							<label for="meta_description">Описание</label>
							<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="5" class="form-control">{$product->meta_description|escape}</textarea>
						</div>
						
						<div class="clear"></div>
					  </div>
					  <!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				  </div>
				  <!-- nav-tabs-custom -->
				</div>
		</div>
	</div>
</div>
	
	
</form>
<!-- Основная форма (The End) -->
</section>