<?php /* Smarty version Smarty-3.1.18, created on 2017-11-21 14:14:14
         compiled from "engine/templates/html/products/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11803278255a07044eda4286-59186549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f67385c9617c672e32ec54d06969fbd6a076f62' => 
    array (
      0 => 'engine/templates/html/products/products.tpl',
      1 => 1511266452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11803278255a07044eda4286-59186549',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a07044ee50d97_52093585',
  'variables' => 
  array (
    'products_count' => 0,
    'products' => 0,
    'product' => 0,
    'image' => 0,
    'variant' => 0,
    'currency' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a07044ee50d97_52093585')) {function content_5a07044ee50d97_52093585($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/astyle/mdk.ua/www/Smarty/libs/plugins/modifier.truncate.php';
?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Список товаров', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('catalog', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('products', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/products.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1>Каталог товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Каталог товаров</li>
	</ol>
</section>

<section class="content">
<form id="list_form" method="post">
<!-- Main row -->
  <div class="row">
	<!-- Left col -->
	<div class="col-md-12">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-th-list"></i>
		  <h3 class="box-title" style="line-height:1.5">Список товаров (<?php echo $_smarty_tpl->tpl_vars['products_count']->value;?>
)</h3>
		  <a href="index.php?module=ProductAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить товар</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th sortable-table" id="functional-table">
                <tbody>
				<tr>
					<th class="move-cell"></th>
					<th class="checkbox-cell ln-inherit">
						<input type="checkbox" class="minimal checkbox-toggle">
					</th>
					<th class="id-cell">ID</th>
					<th class="sku-cell">Артикул</th>
					<th>Товар</th>
					<th>Цена</th>
					<th class="actions-cell">Действия</th>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
				<tr class="c_item">
					<td class="move-cell">
						<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->position;?>
">
						<div class="move_zone"><i class="fa fa-bars"></i></div>
					</td>
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
					</td>
					<td class="id-cell">
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->id, ENT_QUOTES, 'UTF-8', true);?>

					</td>
					<td class="sku-cell">
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->sku, ENT_QUOTES, 'UTF-8', true);?>

					</td>
					<td class="product-cell">
						<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['product']->value->images), null, 0);?>
						<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier(htmlspecialchars($_smarty_tpl->tpl_vars['image']->value->filename, ENT_QUOTES, 'UTF-8', true),50,50);?>
" /></a>
						<?php }?>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
					</td>
					<td class="price-cell">
						<ul>
						<?php  $_smarty_tpl->tpl_vars['variant'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['variant']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['variant']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['variant']->key => $_smarty_tpl->tpl_vars['variant']->value) {
$_smarty_tpl->tpl_vars['variant']->_loop = true;
 $_smarty_tpl->tpl_vars['variant']->index++;
 $_smarty_tpl->tpl_vars['variant']->first = $_smarty_tpl->tpl_vars['variant']->index === 0;
?>
							<li <?php if (!$_smarty_tpl->tpl_vars['variant']->first) {?>class="variant" style="display:none;"<?php }?>>
								<div class="variant-name"><i title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smarty_modifier_truncate(htmlspecialchars($_smarty_tpl->tpl_vars['variant']->value->name, ENT_QUOTES, 'UTF-8', true),20,'…',true,true);?>
</i></div>
								<input style="max-width:90px" type="text" name="price[<?php echo $_smarty_tpl->tpl_vars['variant']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['variant']->value->price;?>
" class="form-control" <?php if ($_smarty_tpl->tpl_vars['variant']->value->compare_price>0) {?>title="Старая цена &mdash; <?php echo $_smarty_tpl->tpl_vars['variant']->value->compare_price;?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
"<?php }?> />&nbsp;<label><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</label>
								<input class="form-control" type="text" name="stock[<?php echo $_smarty_tpl->tpl_vars['variant']->value->id;?>
]" value="<?php if ($_smarty_tpl->tpl_vars['variant']->value->infinity) {?>∞<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['variant']->value->stock;?>
<?php }?>" style="max-width:60px;min-width:60px" />&nbsp;<label><?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>
</label>
							</li>
						<?php } ?>
						</ul>
					</td>
					<td class="actions-cell">
						<button class="featured btn btn-sm <?php if (!$_smarty_tpl->tpl_vars['product']->value->featured) {?>btn-default<?php } else { ?>btn-warning act<?php }?> btn-flat btn-actions" data-toggle="tooltip" title="Рекомендуемый"><i class="fa fa-fire"></i></button>						
						<button class="enable btn btn-sm btn-flat <?php if (!$_smarty_tpl->tpl_vars['product']->value->visible) {?>btn-default<?php } else { ?>btn-success act<?php }?> btn-actions" data-toggle="tooltip" title="Активен" ><i class="fa fa-lightbulb-o"></i></button>
						<a href="../products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
" class="btn btn-sm btn-primary btn-flat btn-actions preview" data-toggle="tooltip" title="Открыть товар на сайте в новом окне"  target="_blank"><i class="fa fa-share"></i></a>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['product']->value->id),$_smarty_tpl);?>
" class="btn btn-sm btn-flat btn-primary btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
						<button class="delete btn btn-sm btn-flat btn-danger btn-actions" data-toggle="tooltip" title="Удалить" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="7">
						Товаров нет
					</td>
				</tr>
				<?php }?>
				</tbody>
			</table>
			<div class="col-lg-12">
			<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
			<button type="submit" class="btn btn-block btn-success btn-flat"value="Применить">Применить</button>
		</div>
	  </div>
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</form>
</section>

<?php }} ?>
