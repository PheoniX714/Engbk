<?php /* Smarty version Smarty-3.1.18, created on 2017-11-28 18:27:20
         compiled from "engine/templates/html/settings/manager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:328988335a1d8e687f76c6-08755485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b008cbe19dac14b61b83d35f46cc59a745ec2129' => 
    array (
      0 => 'engine/templates/html/settings/manager.tpl',
      1 => 1498598499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '328988335a1d8e687f76c6-08755485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'manager' => 0,
    'perms' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a1d8e688e96a8_98725599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1d8e688e96a8_98725599')) {function content_5a1d8e688e96a8_98725599($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('settings', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('managers', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>

<?php if ($_smarty_tpl->tpl_vars['m']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['m']->value->login, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новый менеджер', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>

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
	<h1><?php if ($_smarty_tpl->tpl_vars['m']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['m']->value->login;?>
<?php } else { ?>Новый менеджер<?php }?> <small>Редактирование менеджера</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'ManagersAdmin'),$_smarty_tpl);?>
">Менеджеры</a></li>
		<li class="active"><?php if ($_smarty_tpl->tpl_vars['m']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['m']->value->login;?>
<?php } else { ?>Новый менеджер<?php }?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Менеджер добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Менеджер обновлен<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_success']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></h4>
				<p>Внесенные изменения успешно применены</p>
			</div>
		</div>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='login_exists') {?>Менеджер с таким логином уже существует
				<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='empty_login') {?>Введите логин
				<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_error']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>

		<!-- Основная форма -->
		<form method=post id=product enctype="multipart/form-data">
		<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-user-secret"></i>
				  <h3 class="box-title" style="line-height:1.5">Данные менеджера</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="name">Логин</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
							<input type="text" id="name" class="form-control" name="login" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->login, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="32" />
						 </div>
						<input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" />
					</div>
					<div class="form-group col-sm-4">
						<label for="password">Пароль</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input type="password" id="password" class="form-control" name="password" value="" placeholder="Введите новый пароль"/>
						</div>
						
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			
			<div class="box box-warning"> 
				<div class="box-header with-border">
				  <i class="fa fa-key"></i>
				  <h3 class="box-title" style="line-height:1.5">Предоставить доступ к</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-striped table-bordered table-hover tabled-view black-th" id="functional-table">
						<thead>
							<tr>
							<th class="checkbox-cell ln-inherit">
								<?php if ($_smarty_tpl->tpl_vars['m']->value->id!=$_smarty_tpl->tpl_vars['manager']->value->id||$_smarty_tpl->tpl_vars['m']->value->id!=1) {?><input type="checkbox" class="minimal checkbox-toggle"><?php }?>
							</th>
							<th style="vertical-align:middle;">Модуль</th>
							</tr>
						</thead>
						
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['perms']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
							<tr <?php if ($_smarty_tpl->tpl_vars['m']->value->permissions&&in_array($_smarty_tpl->tpl_vars['p']->value['code'],$_smarty_tpl->tpl_vars['m']->value->permissions)) {?>class="success"<?php }?>>
								<td class="checkbox-cell ln-inherit">
									<input type="checkbox" class="minimal" id="<?php echo $_smarty_tpl->tpl_vars['p']->value['code'];?>
" name="permissions[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['code'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value->permissions&&in_array($_smarty_tpl->tpl_vars['p']->value['code'],$_smarty_tpl->tpl_vars['m']->value->permissions)) {?>checked<?php }?> <?php if ($_smarty_tpl->tpl_vars['m']->value->id==$_smarty_tpl->tpl_vars['manager']->value->id||$_smarty_tpl->tpl_vars['m']->value->id==1) {?>disabled<?php }?>>
								</td>
								<td><?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			
			<div class="form-group col-sm-12">
				<input class="btn btn-success pull-right btn-flat" type="submit" name="" value="Сохранить">
			</div>

		</form>
		</div>
</section>
	<!-- Основная форма (The End) -->
<?php }} ?>
