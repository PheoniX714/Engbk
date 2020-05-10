<?php
/* Smarty version 3.1.32, created on 2020-03-20 17:17:40
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e74de94139d66_42280177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e09f1e1233fbc70b947dcfd366e755d2e220bb8' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/product.tpl',
      1 => 1584716068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:editor/tinymce_init.tpl' => 1,
  ),
),false)) {
function content_5e74de94139d66_42280177 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'category_select' => 
  array (
    'compiled_filepath' => '/home/astyle/a-style.kh.ua/dev2/engine/templates/compiled/5e09f1e1233fbc70b947dcfd366e755d2e220bb8_0.file.product.tpl.php',
    'uid' => '5e09f1e1233fbc70b947dcfd366e755d2e220bb8',
    'call_name' => 'smarty_template_function_category_select_11572738025e74de940cd534_65856394',
  ),
));
if ($_smarty_tpl->tpl_vars['product']->value->id) {
$_smarty_tpl->_assignInScope('meta_title', $_smarty_tpl->tpl_vars['product']->value->name ,false ,8);
} else {
$_smarty_tpl->_assignInScope('meta_title', 'Новый товар' ,false ,8);
}
$_smarty_tpl->_assignInScope('sm_groupe', "products" ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', "products" ,false ,8);?>

<?php $_smarty_tpl->_subTemplateRender('file:editor/tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="e-commerce-product" class="page-layout simple tabbed">

	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<input name="id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
	<input name="language_id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
	
	<div class="page-header bg-primary text-auto row no-gutters align-items-center justify-content-between p-6">

		<div class="row no-gutters align-items-center">

			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ProductsAdmin'),$_smarty_tpl ) );?>
" class="btn btn-icon mr-4 fuse-ripple-ready">
				<i class="icon icon-arrow-left"></i>
			</a>

			<div class="product-image mr-4">
				<img src="/engine/templates/img/ecommerce/product-image-placeholder.png">
			</div>

			<div><h2 class="m-0"><?php if ($_smarty_tpl->tpl_vars['product']->value->id) {
echo $_smarty_tpl->tpl_vars['product']->value->name;
} else { ?>Новый товар<?php }?></h2></div>
		</div>
		
		
		<div class="d-flex align-items-center">
			<div class="d-flex align-items-center mr-2">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
					<option value='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ProductAdmin','language_id'=>$_smarty_tpl->tpl_vars['l']->value->id,'id'=>$_smarty_tpl->tpl_vars['product']->value->id,'message_success'=>null,'return'=>null),$_smarty_tpl ) );?>
' <?php if ($_smarty_tpl->tpl_vars['language']->value->id == $_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>				
				</select>
			</div>
			<a class="btn btn-secondary fuse-ripple-ready mr-2" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ProductAdmin','id'=>null,'message_success'=>null,'message_error'=>null),$_smarty_tpl ) );?>
">+ Товар</a>
			<button type="submit" class="btn btn-success fuse-ripple-ready">Сохранить</button>
		</div>
	</div>
		
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
			<?php echo '<script'; ?>
>  
				$(document).ready(function(){  
					PNotify.defaults.styling = 'material';
					PNotify.defaults.icons = 'material';
					PNotify.success({
					  title: 'Готово!',
					  text: "<?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'added') {?>Товар добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'updated') {?>Товар обновлен<?php }?>",
					  stack: {dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}
					});
				});   
			<?php echo '</script'; ?>
> 
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
			<?php echo '<script'; ?>
>  
				$(document).ready(function(){   
					PNotify.defaults.styling = 'material';
					PNotify.defaults.icons = 'material';
					PNotify.error({
					  title: 'Ой, что то не так...',
					  text: "<?php if ($_smarty_tpl->tpl_vars['message_error']->value == 'url_exists') {?>Товар с таким адресом уже существует<?php }?>",
					  stack: {dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}
					});
				});   
			<?php echo '</script'; ?>
>
			<?php }?>
			
			<div class="tab-content">
				<div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

					<div class="row">
						<div class="col-12 mb-5">
							<div class="card mb-3">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<div class="form-group mb-1">
												<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название товара" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
">
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
													<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" <?php if ($_smarty_tpl->tpl_vars['product']->value->visible) {?>checked<?php }?>>
													<span class="checkbox-icon fuse-ripple-ready text-blue"></span>
													<span class="form-check-description">Отображать на сайте</span>
												</label>
											</div>
											<div class="form-check">
												<label class="form-check-label">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="featured" <?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?>checked<?php }?>>
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
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_categories']->value, 'product_category', false, NULL, 'categories', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product_category']->value) {
?>
										<div class="category d-flex justify-content-between align-items-center flex-nowrap p-4">
											<div class="category-name w-90">
												<div class="form-group p-0 m-0">
													<select class="w-100 p-2" name="categories[]">
														
														<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'category_select', array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'selected_id'=>$_smarty_tpl->tpl_vars['product_category']->value->category_id), true);?>

													</select>																						
												</div>
											</div>
											<div class="category-buttons w-10 align-items-center justify-content-center p-0">
												<button type="button" class="btn btn-icon delete_category" <?php if (count($_smarty_tpl->tpl_vars['product_categories']->value) == 1) {?>style="display:none;"<?php }?> data-toggle="tooltip" data-placement="bottom" title="Удалить категорию">
													<i class="icon icon-trash text-red"></i>
												</button>
											</div>
										</div>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
												<input type="text" class="form-control" id="meta_title" name="meta_title" aria-describedby="meta_titleHelp" placeholder="Введите заголовок товара" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
" autocomplete="off">
												<label for="meta_title">Заголовок товара</label>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" aria-describedby="meta_keywordsHelp" placeholder="Введите название товара" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
" autocomplete="off">
												<label for="meta_keywords">Ключевые слова</label>
											</div>
										</div>
										<div class="col-12 px-5">
											<div class="form-row d-flex align-items-center">
												<label for="url">Адрес</label>
												<div class="input-group">
													<span class="input-group-addon" id="basic-addon3">/product/</span>
													<input type="text" class="form-control" id="url" name="url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Адрес" aria-describedby="basic-addon3" autocomplete="off">
												</div>
											</div>
										</div>
									
										<div class="col-12 pt-5">
											<div class="form-group">
												<textarea class="form-control p-2" id="meta_description" name="meta_description" id="meta_description" rows="4" autocomplete="off"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
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
										<?php if ($_smarty_tpl->tpl_vars['product_images']->value) {?>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_images']->value, 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
										<div class="image-box w-50 w-md-20">
											<div class="image">
												<img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'resize' ][ 0 ], array( $_smarty_tpl->tpl_vars['image']->value->filename,180,180 ));?>
" class="w-100">
												<div class="image-controls justify-content-between align-items-center bg-grey-800">
													<input name="positions[]" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" />
													<div class="handle p-0 px-md-1"><i class="icon icon-drag text-white"></i></div>
													
													<button type="button" class="btn btn-icon delete_image p-0 px-md-1" data-toggle="tooltip" data-placement="bottom" title="Удалить изображение">
														<i class="icon icon-close text-red"></i>
													</button>
												</div>
											</div>
										</div>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php } else { ?>
										
										<?php }?>
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
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_variants']->value, 'variant', false, NULL, 'variants', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['variant']->value) {
?>
												<div class="variant sort-item p-4 row no-gutters d-flex flex-row flex-wrap flex-md-nowrap align-items-center justify-content-between">
													<div class="handle w-5 px-2 d-flex align-items-center justify-content-center">
														<i class="icon icon-drag cursor-pointer"></i>
													</div>
													<input name="variants[id][]" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" />
													
													<div class="form-group w-90 w-sm-40">
														<input class="form-control" type="text" name="variants[name][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" id="variant_name" autocomplete="off"/>
														<label for="variant_name">Название варианта</label>
													</div>

													<div class="form-group w-45 w-sm-15">
														<input class="form-control" type="text" name="variants[price][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->price, ENT_QUOTES, 'UTF-8', true);?>
" id="variant_price" autocomplete="off"/>
														<label for="variant_price">Цена, грн</label>
													</div>
													
													<div class="form-group w-45 w-sm-15">
														<input class="form-control" type="text" name="variants[compare_price][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->compare_price, ENT_QUOTES, 'UTF-8', true);?>
" id="compare_price" autocomplete="off"/>
														<label for="compare_price">Старая цена, грн</label>
													</div>
													
													<div class="form-group w-45 w-sm-15">
														<input class="form-control" type="text" name="variants[stock][]" value="<?php if ($_smarty_tpl->tpl_vars['variant']->value->infinity || $_smarty_tpl->tpl_vars['variant']->value->stock == '') {?>∞<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->stock, ENT_QUOTES, 'UTF-8', true);
}?>" id="variant_stock" autocomplete="off"/>
														<label for="variant_stock">Остаток, шт</label>
													</div>
													
													<div class="buttons w-45 w-sm-5 d-flex align-items-center justify-content-start justify-content-md-end">
														<button type="button" class="btn btn-icon delete_variant" <?php if (count($_smarty_tpl->tpl_vars['product_variants']->value) == 1) {?>style="display:none;"<?php }?> data-toggle="tooltip" data-placement="bottom" title="Удалить вариант">
															<i class="icon icon-trash text-red"></i>
														</button>
													</div>
												</div>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>											
												
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
										<?php echo '<script'; ?>
>
										var categories_features = new Array();
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories_features']->value, 'fs', false, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value => $_smarty_tpl->tpl_vars['fs']->value) {
?>
										categories_features[<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
]  = Array(<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fs']->value, 'f');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['f']->value) {
?>'<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
', <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>0);
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php echo '</script'; ?>
>
					
										<div class="prop_ul" <?php if (!$_smarty_tpl->tpl_vars['categories']->value) {?>style='display:none;'<?php }?>>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['features']->value, 'feature');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
?>
											<?php $_smarty_tpl->_assignInScope('feature_id', $_smarty_tpl->tpl_vars['feature']->value->id);?>
											<div class="form-group pt-2 mb-2" feature_id=<?php echo $_smarty_tpl->tpl_vars['feature_id']->value;?>
>
												<div class="row">
													<label class="col-3 d-flex align-items-center justify-content-end"><strong><?php echo $_smarty_tpl->tpl_vars['feature']->value->name;?>
:</strong></label>
													<div class="col-9">
														<input class="form-control" type="text" name=options[<?php echo $_smarty_tpl->tpl_vars['feature_id']->value;?>
] value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['feature_id']->value]->value, ENT_QUOTES, 'UTF-8', true);?>
" />
													</div>
												</div>
											</div>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
										<textarea name="body" rows="10" class="form-control editor_large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->body, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
									</div>
								</div>
							</div>

						</div>
						
						
												
						
					</div>
				</div>
			</div>
		
			
		</div>	
	</div>
	</form>
</div><?php }
/* smarty_template_function_category_select_11572738025e74de940cd534_65856394 */
if (!function_exists('smarty_template_function_category_select_11572738025e74de940cd534_65856394')) {
function smarty_template_function_category_select_11572738025e74de940cd534_65856394(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('level'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
															<option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['category']->value->id == $_smarty_tpl->tpl_vars['selected_id']->value) {?>selected<?php }?> category_name='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'><?php
$__section_sp_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_sp_0_total = $__section_sp_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sp'] = new Smarty_Variable(array());
if ($__section_sp_0_total !== 0) {
for ($__section_sp_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sp']->value['index'] = 0; $__section_sp_0_iteration <= $__section_sp_0_total; $__section_sp_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sp']->value['index']++){
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php
}
}
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
																<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'category_select', array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'selected_id'=>$_smarty_tpl->tpl_vars['selected_id']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), true);?>

														<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
														<?php
}}
/*/ smarty_template_function_category_select_11572738025e74de940cd534_65856394 */
}
