<?php /* Smarty version Smarty-3.1.18, created on 2017-11-28 12:34:54
         compiled from "engine/templates/html/products/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3895246825a071c96092a66-34087958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73178918387ff2f4c8461e0c0021851592dcfc80' => 
    array (
      0 => 'engine/templates/html/products/product.tpl',
      1 => 1511865230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3895246825a071c96092a66-34087958',
  'function' => 
  array (
    'category_select' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a071c962c71c5_54319577',
  'variables' => 
  array (
    'product' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'languages' => 0,
    'l' => 0,
    'language_id' => 0,
    'product_variants' => 0,
    'variant' => 0,
    'settings' => 0,
    'product_categories' => 0,
    'categories' => 0,
    'category' => 0,
    'selected_id' => 0,
    'level' => 0,
    'product_category' => 0,
    'product_images' => 0,
    'image' => 0,
    'categories_features' => 0,
    'c' => 0,
    'fs' => 0,
    'f' => 0,
    'features' => 0,
    'feature' => 0,
    'feature_id' => 0,
    'options' => 0,
    'related_products' => 0,
    'related_product' => 0,
    'product_group' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a071c962c71c5_54319577')) {function content_5a071c962c71c5_54319577($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['product']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новый товар', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('catalog', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('products', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	<link rel="stylesheet" href="./templates/js/plugins/colorpicker/bootstrap-colorpicker.min.css">
	<link href="templates/js/fileinput/fileinput.css" media="all" rel="stylesheet" type="text/css" />
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
	
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script src="./templates/js/autocomplete/jquery.autocomplete-min.js"></script>
	<script src="./templates/js/modules/product.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php if ($_smarty_tpl->tpl_vars['product']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
<?php } else { ?>Новый товар<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=ProductsAdmin">Каталог товаров</a></li>
        <li class="active"><?php if ($_smarty_tpl->tpl_vars['product']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
<?php } else { ?>Новый товар<?php }?></li>
	</ol>
</section>

<section class="content">

<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="alert alert-success">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
	<b><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Товар добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Товар изменен<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_success']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></b>
	
	<a class="btn btn-success btn-xs pull-right" style="margin-right:20px;" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductAdmin','id'=>null),$_smarty_tpl);?>
"><i class="fa fa-plus"></i> Добавить новый товар</a>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>	

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="alert alert-danger">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
	<b><?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Товар с таким адресом уже существует<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='empty_name') {?>Введите название<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_error']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></b>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">

	<div class="row">
		<div class="col-lg-12">
			<div class="box box-success"> 
				<div class="box-header">
				  <i class="fa fa-edit"></i>
				  <h3 class="box-title" style="line-height:1.5"><?php if ($_smarty_tpl->tpl_vars['product']->value->id) {?>Редактирование товара<?php } else { ?>Создание товара<?php }?></h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" value="Сохранить">
				  <select id="language_id" class="form-control pull-right" style="width:150px; height:30px; padding: 4px 12px; margin-right:15px; cursor:pointer;" onchange="if (this.value) window.location.href=this.value" <?php if (!$_smarty_tpl->tpl_vars['product']->value->id) {?>disabled<?php }?>>
					<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
						<option value='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['product']->value->id,'language_id'=>$_smarty_tpl->tpl_vars['l']->value->id,'return'=>null),$_smarty_tpl);?>
' <?php if ($_smarty_tpl->tpl_vars['language_id']->value==$_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
						<?php if (!$_smarty_tpl->tpl_vars['product']->value->id) {?><?php break 1?><?php }?>
					<?php } ?>
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
							<input type="text" id="name" class="form-control" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
							<input name="id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
							<?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?><input name="language_id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_id']->value, ENT_QUOTES, 'UTF-8', true);?>
"/><?php }?>
						</div>
						<div class="col-lg-4">
							<label for="visible_name">Название товара на сайте</label>
							<input type="text" id="visible_name" class="form-control" name="visible_name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
" />
						</div>
						<div class="col-lg-1">
							<div class="checkbox" style="margin-top:31px;">
								<label>
									<input type="checkbox" name="visible" class="minimal" <?php if ($_smarty_tpl->tpl_vars['product']->value->visible) {?>checked<?php }?> <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?>>
									Активен
								</label>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="checkbox" style="margin-top:31px;">
								<label>
									<input type="checkbox" name="featured" class="minimal" <?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?>checked<?php }?> <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?>>
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
								<?php  $_smarty_tpl->tpl_vars['variant'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['variant']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_variants']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['variant']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['variant']->key => $_smarty_tpl->tpl_vars['variant']->value) {
$_smarty_tpl->tpl_vars['variant']->_loop = true;
 $_smarty_tpl->tpl_vars['variant']->index++;
 $_smarty_tpl->tpl_vars['variant']->first = $_smarty_tpl->tpl_vars['variant']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['variants']['first'] = $_smarty_tpl->tpl_vars['variant']->first;
?>
								<tr class="c_item">
									<td class="move-cell">
										<input name="variants[id][]" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" />
										 <?php if ($_smarty_tpl->tpl_vars['language_id']->value==1) {?><div class="move_zone"><i class="fa fa-bars"></i></div><?php }?>
									</td>
									<td class="name-cell">
										<input name="variants[name][]" type="text" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
									</td>
									<td>
										<input name="variants[sku][]" type="text" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->sku, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> />
									</td>
									<td class="price-cell">
										<input name="variants[price][]" type="text" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->price, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> />
									</td>
									<td class="price-cell">
										<input name="variants[compare_price][]" type="text" class="form-control" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->compare_price, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> />
									</td>
									<td>
										<div><div style="width:50px; display:inline-block; margin-right:10px;"><input name="variants[stock][]" class="form-control" type="text" value="<?php if ($_smarty_tpl->tpl_vars['variant']->value->infinity||$_smarty_tpl->tpl_vars['variant']->value->stock=='') {?>∞<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->stock, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> /></div><div style="display:inline-block"> <?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
</div></div>
									</td>
									<td class="actions-cell" style="width:100px;">
										<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['variants']['first']) {?>
										<button type="button" class="btn btn-sm btn-flat btn-success btn-actions" data-toggle="tooltip" title="Добавить вариант" id="add_variant" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?>><i class="fa fa-plus"></i></button>
										<button type="button" class="btn btn-sm btn-flat btn-danger btn-actions" style="display:none;" data-toggle="tooltip" title="Удалить вариант" id="del_variant" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> ><i class="fa fa-trash-o"></i></button>
										<?php } else { ?>
										<button type="button" class="btn btn-sm btn-flat btn-danger btn-actions" data-toggle="tooltip" title="Удалить вариант" id="del_variant" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> ><i class="fa fa-trash-o"></i></button>
										<?php }?>
									</td>
										
								</tr>
								<?php } ?>
							</tbody>
							</table>
						</div>
						
						<div id="product_categories" class="col-lg-4">
							<label for="menu_id">Категории</label>
							<div>
								<ul class="clear-list">
									<?php  $_smarty_tpl->tpl_vars['product_category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product_category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product_category']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product_category']->key => $_smarty_tpl->tpl_vars['product_category']->value) {
$_smarty_tpl->tpl_vars['product_category']->_loop = true;
 $_smarty_tpl->tpl_vars['product_category']->index++;
 $_smarty_tpl->tpl_vars['product_category']->first = $_smarty_tpl->tpl_vars['product_category']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['first'] = $_smarty_tpl->tpl_vars['product_category']->first;
?>
									<li>
										<div class="row">
											<div class="col-lg-10">
												<select id="menu_id" class="form-control" name="categories[]" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?>>
													<?php if (!function_exists('smarty_template_function_category_select')) {
    function smarty_template_function_category_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['category_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
													<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
														<option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['selected_id']->value) {?>selected<?php }?> category_name='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
'><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['name'] = 'sp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total']);
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
															<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'selected_id'=>$_smarty_tpl->tpl_vars['selected_id']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

													<?php } ?>
													<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

													<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'selected_id'=>$_smarty_tpl->tpl_vars['product_category']->value->id));?>

												</select>
											</div>
											<div class="col-lg-2">
												<button type="button" <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['first']) {?>style='display:none;'<?php }?> class="btn btn-sm btn-flat btn-success btn-actions add" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?>><i class="fa fa-plus"></i></button>
												<button type="button" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['first']) {?>style='display:none;'<?php }?> class="delete btn btn-sm btn-flat btn-danger btn-actions" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?>><i class="fa fa-minus"></i></button>
											</div>
										</div>
									</li>
								<?php } ?>		
								</ul>
							</div>
						</div>
						
						
						<?php echo $_smarty_tpl->getSubTemplate ('editor/tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						
						<div>
							<div class="col-md-12"><h4><b>Краткое описание</b></h4></div>
							<div class="col-md-12"><textarea name="annotation" rows="5" class="form-control editor_small"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->annotation, ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
							<div class="clear"></div>
						</div>
						
						
						<div>
							<div class="col-md-12"><h4><b>Описание товара</b></h4></div>
							<div class="col-md-12"><textarea name="body" rows="10" class="form-control editor_large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->body, ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
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
								<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
								<div class="col-md-2 image-box">
									<div class="image">
										<img src="/files/originals/<?php echo $_smarty_tpl->tpl_vars['image']->value->filename;?>
">
										<div class="image-check"><input type="checkbox" name="check[]" class="im-check" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"></div>
										<div class="image-controls">
											<input name="positions[]" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" />
											<div class="move_zone"><i class="fa fa-arrows"></i></div>
											<div class="open-image"><a href="/files/originals/<?php echo $_smarty_tpl->tpl_vars['image']->value->filename;?>
" data-toggle="tooltip" title="Открыть изображение в новом окне" target="__blank"><i class="fa fa-eye"></i></a></div>
											<div class="delete-image" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash"></i></div>
										</div>
									</div>
								</div>
								<?php } ?>
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
						<?php  $_smarty_tpl->tpl_vars['fs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fs']->_loop = false;
 $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fs']->key => $_smarty_tpl->tpl_vars['fs']->value) {
$_smarty_tpl->tpl_vars['fs']->_loop = true;
 $_smarty_tpl->tpl_vars['c']->value = $_smarty_tpl->tpl_vars['fs']->key;
?>
						categories_features[<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
]  = Array(<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>'<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
', <?php } ?>0);
						<?php } ?>
						</script>
						
						<div class="block layer" <?php if (!$_smarty_tpl->tpl_vars['categories']->value) {?>style='display:none;'<?php }?>>
							<div class="col-lg-4">
								<div class="prop_ul">
									<?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
										<?php $_smarty_tpl->tpl_vars['feature_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['feature']->value->id, null, 0);?>
										<div class="form-group" feature_id=<?php echo $_smarty_tpl->tpl_vars['feature_id']->value;?>
>
											<div class="row">
												<label class="col-lg-4"><?php echo $_smarty_tpl->tpl_vars['feature']->value->name;?>
: </label>
												<div class="col-lg-8">
													<input class="form-control" type="text" name=options[<?php echo $_smarty_tpl->tpl_vars['feature_id']->value;?>
] value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['options']->value[$_smarty_tpl->tpl_vars['feature_id']->value]->value, ENT_QUOTES, 'UTF-8', true);?>
" />
												</div>
											</div>
										</div>
									<?php } ?>
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
							
						
							<div class="col-lg-12"><input type=text name=related id='related_products' class="form-control input_autocomplete col-md-12" placeholder='Выберите товар чтобы добавить его'></div>
							
							<div class="col-lg-6">
								<div id=list class="sortable-list related_products">
									<?php  $_smarty_tpl->tpl_vars['related_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['related_product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['related_product']->key => $_smarty_tpl->tpl_vars['related_product']->value) {
$_smarty_tpl->tpl_vars['related_product']->_loop = true;
?>
									<div class="r-row">
										<div class="move_cell col-md-1">
											<div class="move_bars"><i class="fa fa-bars"></i></div>
										</div>
										<div class="image_cell col-md-2">
										<input type=hidden name=related_products[] value='<?php echo $_smarty_tpl->tpl_vars['related_product']->value->id;?>
'>
										<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('id'=>$_smarty_tpl->tpl_vars['related_product']->value->id),$_smarty_tpl);?>
">
										<img class=product_icon src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['related_product']->value->images[0]->filename,100,100);?>
'>
										</a>
										</div>
										<div class="name_cell col-md-8">
										<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('id'=>$_smarty_tpl->tpl_vars['related_product']->value->id),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['related_product']->value->name;?>
</a>
										</div>
										<div class="icons_cell col-md-1">
										<button class="btn btn-sm btn-danger delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
										</div>
										<div class="clear"></div>
									</div>
									<?php } ?>
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
										<button class="btn btn-sm btn-danger delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
					  </div>
					  
					  <div class="tab-pane" id="product-group" >
							<div class="col-lg-12">
								<?php if ($_smarty_tpl->tpl_vars['product_group']->value) {?>
									<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductsGroupAdmin','id'=>$_smarty_tpl->tpl_vars['product_group']->value->group_id),$_smarty_tpl);?>
" class="btn btn-sm btn-flat btn-primary" data-toggle="tooltip" title="Редактировать группу товара"><i class="fa fa-pencil"></i> Редактировать группу</a>
								<?php } else { ?>
									<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductsGroupAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-sm btn-flat btn-primary" data-toggle="tooltip" title="Создать группу товара"><i class="fa fa-plus"></i> Создать группу</a>
								<?php }?>
							</div>
							<div class="col-lg-12"><h4><b>Дополнительные параметры товара для группы</b></h4></div>
							<div class="col-lg-3">
								<label for="color">Цвет товара</label>
								<input type="text" id="color" class="form-control my-colorpicker1 colorpicker-element" name="color" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->color, ENT_QUOTES, 'UTF-8', true);?>
">
							</div>
							
							
							<div class="clear"></div>
					  </div>
					  
					  <div class="tab-pane" id="seo">
						<div class="col-lg-4">
							<label for="url">Адрес</label>
							<input type="text" id="url" class="form-control" name="url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['language_id']->value!=1) {?>disabled<?php }?> />
						</div>
						<div class="col-lg-4">
							<label for="meta_title">Заголовок страницы</label>
							<input type="text" id="meta_title" class="form-control" name="meta_title" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
">
						</div>
						<div class="col-lg-12">
							<label for="meta_keywords">Ключевые слова</label>
							<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
">
						</div>
						<div class="col-lg-12">
							<label for="meta_description">Описание</label>
							<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="5" class="form-control"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
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
</section><?php }} ?>
