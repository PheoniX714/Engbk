<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 18:13:05
         compiled from "engine/templates/html/settings/managers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16297653145a072191ee7311-41350550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0af90023f7a1cf2dac5e50d7e8888a991f3d543d' => 
    array (
      0 => 'engine/templates/html/settings/managers.tpl',
      1 => 1498598084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16297653145a072191ee7311-41350550',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'managers' => 0,
    'manager' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a072192041928_49619257',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a072192041928_49619257')) {function content_5a072192041928_49619257($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Менеджеры', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('settings', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('managers', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/content.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1>Менеджеры<small>Управление менеджерами</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Менеджеры</li>
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
		  <i class="fa fa-user-secret"></i>
		  <h3 class="box-title" style="line-height:1.5">Список менеджеров</h3>
		  <a href="index.php?module=ManagerAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить менеджера</b></a>
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
					<th >Логин</th>
					<th class="last-login">Последний вход</th>
					<th class="actions-cell">
						Действия
					</th>
				</tr>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
				<tr>
					<td class="checkbox-cell">
						<?php if ($_smarty_tpl->tpl_vars['manager']->value->id!=$_smarty_tpl->tpl_vars['m']->value->id) {?><input type="checkbox" class="minimal" name="check[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"><?php }?>
					</td>
					<td class="text-cell"><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->login, ENT_QUOTES, 'UTF-8', true);?>
</b></td>
					<td class="text-cell"><b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->last_login, ENT_QUOTES, 'UTF-8', true);?>
</b></td>
					<td>
						<a href="index.php?module=ManagerAdmin&id=<?php echo urlencode($_smarty_tpl->tpl_vars['m']->value->id);?>
" class="btn btn-sm btn-primary btn-flat btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
						<?php if ($_smarty_tpl->tpl_vars['manager']->value->id!=$_smarty_tpl->tpl_vars['m']->value->id&&$_smarty_tpl->tpl_vars['m']->value->id!=1) {?>
						<button class="delete btn btn-sm btn-danger btn-flat btn-actions" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash-o"></i></button>
						<?php }?>
					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>			
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  
	  <div class="row">
		<div class="form-group col-md-3">
			<select id="action" class="form-control" name="action">
				<option value="">Выберите действие</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
		  
		<div class="col-md-2">
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
