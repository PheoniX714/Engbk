{if $product->id}
{$meta_title = $product->name scope='root'}
{else}
{$meta_title = 'Новый товар' scope='root'}
{/if}
{$sm_groupe = "products" scope='root'}
{$sm_item = "products" scope='root'}

{* Подключаем Tiny MCE *}
{include file='editor/tinymce_init.tpl'}

{capture name=js}
{literal}
<script>
	var images_list = document.getElementById('images_list');
	var sortable = new Sortable(images_list, {
		multiDrag: true,
		selectedClass: 'bg-yellow-100',
		handle: '.handle',
		animation: 150,
		ghostClass: 'bg-blue-100'
	});
	
	var variants_list = document.getElementById('variants_list');
	var sortable = new Sortable(variants_list, {
		multiDrag: true,
		selectedClass: 'bg-yellow-100',
		handle: '.handle',
		animation: 150,
		ghostClass: 'bg-blue-100'
	});

	$(function () {
	
		// Добавление категории
		$("#product_categories").on('click', '#add_category', function() {
			$("#product_categories .categories-list .category:last").clone(false).appendTo('#product_categories .categories-list').fadeIn('slow').find("select[name*=categories]:last").focus();
			$('.categories-list .category .delete_category').show();
			return false;
		});

		// Удаление категории
		$(".categories-list").on('click', '.delete_category', function() {
			$(this).closest(".category").fadeOut(200, function() { $(this).remove(); });
			if($('.categories-list').length==1)
				$('.categories-list .category .delete_category').hide();
			return false;
		});
		
		// Изменение набора свойств при изменении категории
		$('select[name="categories[]"]:first').change(function() {
			show_category_features($("option:selected",this).val());
		});

		// Автодополнение свойств
		$('div.prop_ul input[name*=options]').each(function(index) {
			feature_id = $(this).closest('div').attr('feature_id');
			$(this).autocomplete({
				serviceUrl:'ajax/options_autocomplete.php',
				minChars:0,
				params: {feature_id:feature_id},
				noCache: false
			});
		});
		
		// Добавление нового свойства товара
		var new_feature = $('#new_feature').clone(true);
		$('#new_feature').remove().removeAttr('id');
		$('#add_new_feature').click(function() {
			$(new_feature).clone(true).appendTo('div.new_features').fadeIn('slow').find("input[name*=new_feature_name]").focus();
			return false;
		});	
		
		//Добавление варианта
		$('.variants').on('click', '#add_variant', function() {
			var variant = $('#variants_list .variant:first').clone(true);
			$(variant).find("input[name*=variant][name*=name]").val('');
			$(variant).find("input[name*=variant][name*=sku]").val('');
			$(variant).find("input[name*=variant][name*=id]").val('');
			$(variant).find(".delete_variant").show();
			$(variant).find("input[name*=variant][name*=stock]").val('∞').end().appendTo("#variants_list").show('slow');
			$('#variants_list .variant .delete_variant').show();
			return false;		
		});
		
		// Удаление варианта
		$('#variants_list').on('click', '.delete_variant', function() {
			if($("#variants_list .variant").length>1)
				$(this).closest(".variant").fadeOut(200, function() { $(this).remove(); });
			if($("#variants_list .variant").length==1)
				$('#variants_list .variant .delete_variant').hide();
			return false;
		});
		
		// Удаление варианта
		$('.images-list').on('click', '.delete_image', function() {
			$(this).closest(".image-box").fadeOut(200, function() { $(this).remove(); });
			return false;
		});
		
		<!-- $(document).ready(function() { $(".product_id").select2();}); -->
		
		// Добавление категории
		$("#related_products").on('click', '#add_product', function() {
			$(".products-list .product-row-new").clone(false).appendTo('.products-list').removeClass("product-row-new" ).addClass("product-row" ).fadeIn('slow').find("select[name*=related_products]:last").select2();
			
			return false;
		});

		// Удаление категории
		$(".products-list").on('click', '.delete_product', function() {
			$(this).closest(".row").fadeOut(200, function() { $(this).remove(); });
			return false;
		});
	});
</script>
{/literal}
{/capture}

<div id="e-commerce-product" class="page-layout simple tabbed">

	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	<input name="id" type="hidden" value="{$product->id|escape}"/>
	<input name="language_id" type="hidden" value="{$language->id|escape}"/>
	
	<div class="page-header bg-primary text-auto row no-gutters align-items-center justify-content-between p-6">

		<div class="row no-gutters align-items-center">

			<a href="{url module=ProductsAdmin}" class="btn btn-icon mr-4 fuse-ripple-ready">
				<i class="icon icon-arrow-left"></i>
			</a>

			<div class="product-image mr-4">
				<img src="/engine/templates/img/ecommerce/product-image-placeholder.png">
			</div>

			<div><h2 class="m-0">{if $product->id}{$product->name}{else}Новый товар{/if}</h2></div>
		</div>
		
		
		<div class="d-flex align-items-center">
			<div class="d-flex align-items-center mr-2">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					{foreach $languages as $l}
					<option value='{url module=ProductAdmin language_id=$l->id id=$product->id message_success=null return=null}' {if $language->id == $l->id}selected{/if}>{$l->name|escape}</option>
					{/foreach}				
				</select>
			</div>
			<a class="btn btn-secondary fuse-ripple-ready mr-2" href="{url module=ProductAdmin id=null message_success=null message_error=null}">+ Товар</a>
			<button type="submit" class="btn btn-success fuse-ripple-ready">Сохранить</button>
		</div>
	</div>
		
	<div class="page-content-wrapper">
		<div class="page-content">
			{if $message_success}
			<script>  
				$(document).ready(function(){  
					PNotify.defaults.styling = 'material';
					PNotify.defaults.icons = 'material';
					PNotify.success({
					  title: 'Готово!',
					  text: "{if $message_success == 'added'}Товар добавлен{elseif $message_success == 'updated'}Товар обновлен{/if}",
					  stack: {literal}{dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}{/literal}
					});
				});   
			</script> 
			{/if}
			
			{if $message_error}
			<script>  
				$(document).ready(function(){   
					PNotify.defaults.styling = 'material';
					PNotify.defaults.icons = 'material';
					PNotify.error({
					  title: 'Ой, что то не так...',
					  text: "{if $message_error == 'url_exists'}Товар с таким адресом уже существует{/if}",
					  stack: {literal}{dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}{/literal}
					});
				});   
			</script>
			{/if}
			
			<div class="tab-content">
				<div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

					<div class="row">
						<div class="col-12 mb-5">
							<div class="card mb-3">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<div class="form-group mb-1">
												<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название товара" value="{$product->name|escape}">
												<label for="name">Название товара</label>
											</div>
										</div>									
									</div>
								</div>
							</div>
						</div>
					
						<div class="col-12 col-md-4 mb-5">

							<div class="card mb-5">
								<div class="card-header">
									<b>Основные параметры</b>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-12 d-flex align-items-center">
											<div class="form-check mr-10">
												<label class="form-check-label">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" {if $product->visible}checked{/if}>
													<span class="checkbox-icon fuse-ripple-ready text-blue"></span>
													<span class="form-check-description">Отображать на сайте</span>
												</label>
											</div>
											<div class="form-check">
												<label class="form-check-label">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="featured" {if $product->featured}checked{/if}>
													<span class="checkbox-icon fuse-ripple-ready text-orange"></span>
													<span class="form-check-description">Рекомендуемый товар</span>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div id="product_categories" class="card mb-5">
								<div class="card-header">
									<b>Категории товара</b>
									<div class="float-right">
										<button id="add_category" class="btn btn-secondary btn-sm fuse-ripple-ready" type="button">Добавить категорию</button>
									</div>
								</div>
								<div class="card-body p-0">
									<div class="categories-list">
										{foreach $product_categories as $product_category name=categories}
										<div class="category d-flex justify-content-between align-items-center flex-nowrap p-4">
											<div class="category-name w-90">
												<div class="form-group p-0 m-0">
													<select class="w-100 p-2" name="categories[]">
														{function name=category_select level=0}
														{foreach $categories as $category}
															<option value='{$category->id}' {if $category->id == $selected_id}selected{/if} category_name='{$category->name|escape}'>{section name=sp loop=$level}&nbsp;&nbsp;&nbsp;&nbsp;{/section}{$category->name|escape}</option>
																{category_select categories=$category->subcategories selected_id=$selected_id  level=$level+1}
														{/foreach}
														{/function}
														{category_select categories=$categories selected_id=$product_category->category_id}
													</select>																						
												</div>
											</div>
											<div class="category-buttons w-10 align-items-center justify-content-center p-0">
												<button type="button" class="btn btn-icon delete_category" {if $product_categories|count == 1}style="display:none;"{/if} data-toggle="tooltip" data-placement="bottom" title="Удалить категорию">
													<i class="icon icon-trash text-red"></i>
												</button>
											</div>
										</div>
										{/foreach}
									</div>
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-12 text-right">
											<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
										</div>
									</div>
								</div>
							</div>
							
							<div class="card mb-5">
								
								<div class="card-header">
									<b>Параметры SEO</b>
								</div>
								
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<input type="text" class="form-control" id="meta_title" name="meta_title" aria-describedby="meta_titleHelp" placeholder="Введите заголовок товара" value="{$product->meta_title|escape}" autocomplete="off">
												<label for="meta_title">Заголовок товара</label>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" aria-describedby="meta_keywordsHelp" placeholder="Введите название товара" value="{$product->meta_keywords|escape}" autocomplete="off">
												<label for="meta_keywords">Ключевые слова</label>
											</div>
										</div>
										<div class="col-12 px-5">
											<div class="form-row d-flex align-items-center">
												<label for="url">Адрес</label>
												<div class="input-group">
													<span class="input-group-addon" id="basic-addon3">/product/</span>
													<input type="text" class="form-control" id="url" name="url" value="{$product->url|escape}" placeholder="Адрес" aria-describedby="basic-addon3" autocomplete="off">
												</div>
											</div>
										</div>
									
										<div class="col-12 pt-5">
											<div class="form-group">
												<textarea class="form-control p-2" id="meta_description" name="meta_description" id="meta_description" rows="4" autocomplete="off">{$product->meta_description|escape}</textarea>
												<label for="meta_description">Мета-описание товара</label>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-12 text-right">
											<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-12 col-md-8 mb-5">							
							<div class="card mb-5">
								<div class="card-header">
									<b>Изображения товара</b>
								</div>
								<div class="card-body p-0">
									<div id="images_list" class="images-list d-flex flex-wrap flex-row">
										{if $product_images}
										{foreach $product_images as $image}
										<div class="image-box w-50 w-md-20">
											<div class="image">
												<img src="{$image->filename|resize:180:180}" class="w-100">
												<div class="image-controls justify-content-between align-items-center bg-grey-800">
													<input name="positions[]" type="hidden" value="{$image->id|escape}" class="form-control" />
													<div class="handle p-0 px-md-1"><i class="icon icon-drag text-white"></i></div>
													
													<button type="button" class="btn btn-icon delete_image p-0 px-md-1" data-toggle="tooltip" data-placement="bottom" title="Удалить изображение">
														<i class="icon icon-close text-red"></i>
													</button>
												</div>
											</div>
										</div>
										{/foreach}
										{else}
										
										{/if}
									</div>
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-12 text-right">
											<input type="file"  name="new_images[]" multiple>
											<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
										</div>
									</div>
								</div>
							</div>

							<div class="card mb-5 variants">
								<div class="card-header">
									<b>Варианты товара</b>
									<div class="float-right">
										<button id="add_variant" class="btn btn-secondary btn-sm fuse-ripple-ready" type="button">Добавить вариант</button>
									</div>
								</div>
								<div class="card-body p-0">
									<div class="row">
										<div class="col-12">
											<div id="variants_list" class="w-100">
												{foreach from=$product_variants item=variant name=variants}
												<div class="variant sort-item p-4 row no-gutters d-flex flex-row flex-wrap flex-md-nowrap align-items-center justify-content-between">
													<div class="handle w-5 px-2 d-flex align-items-center justify-content-center">
														<i class="icon icon-drag cursor-pointer"></i>
													</div>
													<input name="variants[id][]" type="hidden" value="{$variant->id|escape}" />
													
													<div class="form-group w-90 w-sm-40">
														<input class="form-control" type="text" name="variants[name][]" value="{$variant->name|escape}" id="variant_name" autocomplete="off"/>
														<label for="variant_name">Название варианта</label>
													</div>

													<div class="form-group w-45 w-sm-15">
														<input class="form-control" type="text" name="variants[price][]" value="{$variant->price|escape}" id="variant_price" autocomplete="off"/>
														<label for="variant_price">Цена, грн</label>
													</div>
													
													<div class="form-group w-45 w-sm-15">
														<input class="form-control" type="text" name="variants[compare_price][]" value="{$variant->compare_price|escape}" id="compare_price" autocomplete="off"/>
														<label for="compare_price">Старая цена, грн</label>
													</div>
													
													<div class="form-group w-45 w-sm-15">
														<input class="form-control" type="text" name="variants[stock][]" value="{if $variant->infinity || $variant->stock == ''}∞{else}{$variant->stock|escape}{/if}" id="variant_stock" autocomplete="off"/>
														<label for="variant_stock">Остаток, шт</label>
													</div>
													
													<div class="buttons w-45 w-sm-5 d-flex align-items-center justify-content-start justify-content-md-end">
														<button type="button" class="btn btn-icon delete_variant" {if $product_variants|count == 1}style="display:none;"{/if} data-toggle="tooltip" data-placement="bottom" title="Удалить вариант">
															<i class="icon icon-trash text-red"></i>
														</button>
													</div>
												</div>
												{/foreach}											
												
											</div>
										</div>
										
										
									</div>
								</div>
							</div>
							
							<div class="card mb-5 variants">
								<div class="card-header">
									<b>Свойства товара</b>
									<div class="float-right">
										<button id="add_new_feature" class="btn btn-secondary btn-sm fuse-ripple-ready" type="button">Добавить свойство</button>
									</div>
								</div>
								<div class="card-body p-0">
									<div class="col-12 py-4">
										<script>
										var categories_features = new Array();
										{foreach from=$categories_features key=c item=fs}
										categories_features[{$c}]  = Array({foreach from=$fs item=f}'{$f}', {/foreach}0);
										{/foreach}
										</script>
					
										<div class="prop_ul" {if !$categories}style='display:none;'{/if}>
											{foreach $features as $feature}
											{assign var=feature_id value=$feature->id}
											<div class="form-group pt-2 mb-2" feature_id={$feature_id}>
												<div class="row">
													<label class="col-3 d-flex align-items-center justify-content-end"><strong>{$feature->name}:</strong></label>
													<div class="col-9">
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
													<label class="property col-3"><input type=text class="form-control" name=new_features_names[]></label>
													<div class="col-9">
														<input class="form-control" type="text" name=new_features_values[] />
													</div>
												</div>
											</div>
										</div>											
									</div>
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-12 text-right">
											<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
										</div>
									</div>
								</div>
							</div>

						</div>
						
						<div class="col-12 mb-5">

							<div class="card">
								<div class="card-header">
									<b>Полное описание</b>
								</div>
								<div class="card-body">
									<div class="w-100 align-items-center d-flex">
										<textarea name="body" rows="10" class="form-control editor_large">{$product->body|escape}</textarea>
									</div>
								</div>
							</div>

						</div>
						
						
						{*
						<div class="col-4 mb-5">
						
							<div id="related_products" class="card mb-5">
								<div class="card-header">
									<b>Связанные товары</b>
									
									<div class="float-right">
										<button id="add_product" class="btn btn-secondary btn-sm fuse-ripple-ready" type="button">Добавить товар</button>
									</div>
								</div>
								<div class="card-body">
									<div class="products-list">
										<div class="product-row-new" style="display:none">
											<div class="row">
												<div class="col-10 form-group m-0 py-3">
													<select class="w-100" name="related_products[]">
														<option value=''>Товар не выбран</option>
														{foreach $all_products as $p}
														<option value='{$p->id}'>{$p->name|escape}</option>
														{/foreach}
													</select>	
												</div>
												<div class="col-2 d-flex category-buttons align-items-center justify-content-start p-0">
													<button type="button" class="btn btn-icon delete_product" data-toggle="tooltip" data-placement="bottom" title="Удалить товар">
														<i class="icon icon-trash text-red"></i>
													</button>
												</div>
											</div>
										</div>
										{foreach $related_products as $product name=related}
										<div class="product-row">
											<div class="row">
												<div class="col-10 form-group m-0 py-3">
													<select class="product_id w-100" name="related_products[]">
														<option value=''>Товар не выбран</option>
														{foreach $all_products as $p}
														<option value='{$p->id}' {if $p->id == $product->id}selected{/if}>{$p->name|escape}</option>
														{/foreach}
													</select>	
												</div>
												<div class="col-2 d-flex category-buttons align-items-center justify-content-start p-0">
													<button type="button" class="btn btn-icon delete_product" data-toggle="tooltip" data-placement="bottom" title="Удалить товар">
														<i class="icon icon-trash text-red"></i>
													</button>
												</div>
											</div>
										</div>
										{/foreach}
									</div>
								</div>
							</div>
						</div>
						*}
						
						
					</div>
				</div>
			</div>
		
			
		</div>	
	</div>
	</form>
</div>