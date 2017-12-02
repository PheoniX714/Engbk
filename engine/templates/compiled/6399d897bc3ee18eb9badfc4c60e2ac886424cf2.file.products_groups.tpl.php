<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 18:12:40
         compiled from "engine/templates/html/products/products_groups.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20117495895a072178aa29c1-22197928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6399d897bc3ee18eb9badfc4c60e2ac886424cf2' => 
    array (
      0 => 'engine/templates/html/products/products_groups.tpl',
      1 => 1509551169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20117495895a072178aa29c1-22197928',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'groups' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a072178b412e0_60977506',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a072178b412e0_60977506')) {function content_5a072178b412e0_60977506($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Список товаров', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
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
	<script src="./templates/js/modules/product_groups.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1>Группы товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Группы товаров</li>
	</ol>
</section>

<section class="content">
<form id="list_form" method="post">
<!-- Main row -->
  <div class="row">
	<!-- Left col -->
	<div class="col-md-6">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-th-list"></i>
		  <h3 class="box-title" style="line-height:1.5">Список групп</h3>
		  <a href="index.php?module=ProductsGroupAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить группу</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th" id="functional-table">
                <tbody>
				<tr>
					<th class="checkbox-cell ln-inherit">
						<input type="checkbox" class="minimal checkbox-toggle">
					</th>
					<th class="id-cell">ID</th>
					<th class="sku-cell">Код группы</th>
					<th class="actions-cell">Действия</th>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['groups']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
				<tr class="c_item">
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
					</td>
					<td class="id-cell">
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value->id, ENT_QUOTES, 'UTF-8', true);?>

					</td>
					<td class="sku-cell">
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value->group_code, ENT_QUOTES, 'UTF-8', true);?>

					</td>
					<td class="actions-cell">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ProductsGroupAdmin','id'=>$_smarty_tpl->tpl_vars['group']->value->id),$_smarty_tpl);?>
" class="btn btn-sm btn-flat btn-primary btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
						<button class="delete btn btn-sm btn-flat btn-danger btn-actions" data-toggle="tooltip" title="Удалить" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="4">
						Групп нет
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
				<option value="">Выберите действие</option>
				<!-- <option value="enable">Сделать активной</option>
				<option value="disable">Сделать неактивной</option> -->
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
</section><?php }} ?>
