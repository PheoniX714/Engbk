<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 18:13:01
         compiled from "engine/templates/html/settings/settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12715485545a07218d61af08-17982778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d186bfb0f9044d11792fab47bdf3202d8bc8022' => 
    array (
      0 => 'engine/templates/html/settings/settings.tpl',
      1 => 1498598151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12715485545a07218d61af08-17982778',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message_success' => 0,
    'message_error' => 0,
    'config' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a07218d6a8ec7_90850212',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a07218d6a8ec7_90850212')) {function content_5a07218d6a8ec7_90850212($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Настройки", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('settings', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('settings', null, 1);
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
	<h1>Настройки</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li>Настройки</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value=='saved') {?>Настройки успешно сохранены<?php }?></h4>
			</div>
		</div>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='watermark_is_not_writable') {?>Установите права на запись для файла <?php echo $_smarty_tpl->tpl_vars['config']->value->watermark_file;?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>

		<!-- Основная форма -->
		<form method="post" id="settings" enctype="multipart/form-data">
		<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-cog"></i>
				  <h3 class="box-title" style="line-height:1.5">Настройки сайта</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="site_name">Имя сайта</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-font"></i></span>
							<input type="text" id="site_name" class="form-control" name="site_name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Введите название сайта" />
						 </div>
					</div>
					<div class="form-group col-sm-4">
						<label for="date_format">Формат даты</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
							<input type="text" id="date_format" class="form-control" name="date_format" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->date_format, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Введите формат даты" />
						 </div>
					</div>
					<div class="form-group col-sm-4">
						<label for="admin_email">Email для восстановления пароля</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" id="admin_email" class="form-control" name="admin_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->admin_email, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Введите email" />
						 </div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-cog"></i>
				  <h3 class="box-title" style="line-height:1.5">Оповещения с сайта</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="order_email">Оповещение о заказах</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" id="order_email" class="form-control" name="order_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->order_email, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Введите email" />
						 </div>
					</div>
					<div class="form-group col-sm-4">
						<label for="comment_email">Оповещение о комментариях</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" id="comment_email" class="form-control" name="comment_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->comment_email, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Введите email" />
						 </div>
					</div>
					<div class="form-group col-sm-4">
						<label for="notify_from_email">Обратный адрес оповещений</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" id="notify_from_email" class="form-control" name="notify_from_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->notify_from_email, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Введите email" />
						 </div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<button type="submit" class="btn btn-block btn-success btn-flat" name="" value="Сохранить">Сохранить</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</section>
<!-- Основная форма (The End) --><?php }} ?>
