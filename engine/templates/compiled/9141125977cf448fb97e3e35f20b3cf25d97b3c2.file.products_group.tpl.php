<?php /* Smarty version Smarty-3.1.18, created on 2017-11-23 09:56:36
         compiled from "engine/templates/html/products/products_group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13897454105a0b21bbc65527-48152108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9141125977cf448fb97e3e35f20b3cf25d97b3c2' => 
    array (
      0 => 'engine/templates/html/products/products_group.tpl',
      1 => 1511423793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13897454105a0b21bbc65527-48152108',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0b21bbd094c5_80832166',
  'variables' => 
  array (
    'group' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'group_products' => 0,
    'group_product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b21bbd094c5_80832166')) {function content_5a0b21bbd094c5_80832166($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['group']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['group']->value->group_code, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новая группа', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('catalog', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('products-groups', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/autocomplete/jquery.autocomplete-min.js"></script>
	<script src="./templates/js/modules/product_group.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php if ($_smarty_tpl->tpl_vars['group']->value->id) {?>Группа товаров <?php echo $_smarty_tpl->tpl_vars['group']->value->group_code;?>
<?php } else { ?>Новая группа<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=ProductsAdmin">Группы товаров</a></li>
        <li class="active"><?php if ($_smarty_tpl->tpl_vars['group']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['group']->value->group_code;?>
<?php } else { ?>Новая группа<?php }?></li>
	</ol>
</section>

<section class="content">

<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="alert alert-success">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
	<b><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Группа добавлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Группа изменена<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_success']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></b>
	
	<a class="btn btn-success btn-xs pull-right" style="margin-right:20px;" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductsGroupAdmin','id'=>null),$_smarty_tpl);?>
"><i class="fa fa-plus"></i> Добавить новую группу</a>
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
<input type=hidden name="id" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->id;?>
">
<input type=hidden name="group_code" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->group_code;?>
">

	
	
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
	</style>
	

	<div class="row">
		<div class="col-lg-12">
			<div class="box box-success"> 
				<div class="box-header">
				  <i class="fa fa-edit"></i>
				  <h3 class="box-title" style="line-height:1.5"><?php if ($_smarty_tpl->tpl_vars['group']->value->id) {?>Редактирование группы<?php } else { ?>Создание группы<?php }?></h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  
					<div class="col-lg-6">
						<input type=text name=group id='group_products' class="form-control input_autocomplete" placeholder='Выберите товар чтобы добавить его'>
					</div>
					<div class="col-lg-6">
						<p>Каждый товар может находится только в одной группе.</p>
					</div>
					
					<div class="clear"></div>
						
					<div class="col-lg-6">
						<div id="list" class="sortable-list group_products">
							<?php if ($_smarty_tpl->tpl_vars['group_products']->value) {?>
							<?php  $_smarty_tpl->tpl_vars['group_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_product']->key => $_smarty_tpl->tpl_vars['group_product']->value) {
$_smarty_tpl->tpl_vars['group_product']->_loop = true;
?>
							<div class="r-row">
								<div class="move_cell col-md-1">
									<div class="move_bars"><i class="fa fa-bars"></i></div>
								</div>
								<div class="image_cell col-md-2">
								<input type=hidden name=group_products[] value='<?php echo $_smarty_tpl->tpl_vars['group_product']->value->id;?>
'>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['group_product']->value->id),$_smarty_tpl);?>
">
								<img class=product_icon src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['group_product']->value->images[0]->filename,100,100);?>
'>
								</a>
								</div>
								<div class="name_cell col-md-8">
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductAdmin','id'=>$_smarty_tpl->tpl_vars['group_product']->value->id),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['group_product']->value->name;?>
</a>
								</div>
								<div class="icons_cell col-md-1">
								<button class="btn btn-sm btn-danger delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
								</div>
								<div class="clear"></div>
							</div>
							<?php } ?>
							<?php }?>
							<div id="new_group_product" class="r-row" style='display:none;'>
								<div class="move_cell col-md-1">
									<div class="move_bars"><i class="fa fa-bars"></i></div>
								</div>
								<div class="image_cell col-md-2">
								<input type=hidden name=group_products[] value=''>
								<img class=product_icon src=''>
								</div>
								<div class="name_cell col-md-9">
								<a class="group_product_name" href=""></a>
								</div>
								<div class="icons_cell col-md-1">
								<button class="btn btn-sm btn-danger delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</form>
<!-- Основная форма (The End) -->
</section><?php }} ?>
