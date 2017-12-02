<?php /* Smarty version Smarty-3.1.18, created on 2017-11-18 13:48:05
         compiled from "engine/templates/html/settings/language.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5349820185a101df57a3d45-03507074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '505e2f9fbfda5aad71820d839530fc3bd4c36593' => 
    array (
      0 => 'engine/templates/html/settings/language.tpl',
      1 => 1498598497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5349820185a101df57a3d45-03507074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'l' => 0,
    'message_success' => 0,
    'message_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a101df581a151_94084079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a101df581a151_94084079')) {function content_5a101df581a151_94084079($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('settings', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('languages', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php if ($_smarty_tpl->tpl_vars['l']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['l']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новый язык', null, 1);
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
	<h1><?php if ($_smarty_tpl->tpl_vars['l']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['l']->value->name;?>
<?php } else { ?>Новый язык<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'LanguagesAdmin','id'=>null),$_smarty_tpl);?>
">Мультиязычность</a></li>
		<li class="active"><?php if ($_smarty_tpl->tpl_vars['l']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['l']->value->name;?>
<?php } else { ?>Новый язык<?php }?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Язык добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Язык обновлен<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_success']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></h4>
				<p>Внесенные изменения успешно применены</p>
			</div>
		</div>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='empty_name') {?>Введите название языка<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value=='empty_code') {?>Введите ISO код языка<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message_error']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>

		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-language"></i>
				  <h3 class="box-title" style="line-height:1.5">Параметры языка</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'LanguageAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить язык</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="name">Название</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-font"></i></span>
							<input type="text" id="name" class="form-control" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="32" placeholder="Введите название" />
						 </div>
						<input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" />
					</div>
					<div class="form-group col-sm-4">
						<label for="code">Код ISO (2 символа)</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-globe"></i></span>
							<input type="text" id="code" class="form-control" name="code" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->code, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Введите ISO код"/>
						</div>
						
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		</form>
	</div>
</section>
	<!-- Основная форма (The End) -->
<?php }} ?>
