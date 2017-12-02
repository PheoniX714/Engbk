<?php /* Smarty version Smarty-3.1.18, created on 2017-11-21 13:54:34
         compiled from "engine/templates/html/settings/languages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13176388175a07218e57d830-06118322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '157d947317c579499229343674145c47faad9a74' => 
    array (
      0 => 'engine/templates/html/settings/languages.tpl',
      1 => 1511265270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13176388175a07218e57d830-06118322',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a07218e610173_91236745',
  'variables' => 
  array (
    'languages' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a07218e610173_91236745')) {function content_5a07218e610173_91236745($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('settings', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('languages', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Мультиязычность", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/languages.js"></script>	 
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>
<section class="content-header">
	<h1>Мультиязычность<small>Управления языками контента</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Мультиязычность</li>
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
		  <i class="fa fa-language"></i>
		  <h3 class="box-title" style="line-height:1.5">Управление языками</h3>
		  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'LanguageAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-sm btn-primary pull-right btn-flat"><i class="fa fa-plus"></i> <b> Добавить язык</b></a>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th sortable-table" id="functional-table">
                <thead>
					<tr id="thead">
						<th class="move-cell"></th>
						<th class="checkbox-cell ln-inherit">
							<input type="checkbox" class="minimal checkbox-toggle">
						</th>
						<th>Название языка</th>
						<th>Код ISO</th>
						<th class="actions-cell">Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
					<tr class="c_item">
						<td class="move-cell">
							<input name="positions[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->id, ENT_QUOTES, 'UTF-8', true);?>
]" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" />
							<div class="move_zone" style=" width: 20px; cursor:pointer; float:left;"><i class="fa fa-bars" style="font-size: 24px;"></i></div>
						</td>
						<td class="checkbox-cell">
							<?php if ($_smarty_tpl->tpl_vars['l']->value->id!=1) {?><input type="checkbox" class="minimal" name="check[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"><?php }?>
						</td>
						<td class="text-cell">
							<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</b> <?php if ($_smarty_tpl->tpl_vars['l']->value->id==1) {?><small><i>(Основной язык сайта)</i></small><?php }?>
						</td>
						<td class="text-cell">
							<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->code, ENT_QUOTES, 'UTF-8', true);?>
</b>
						</td>
						<td>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'LanguageAdmin','id'=>$_smarty_tpl->tpl_vars['l']->value->id),$_smarty_tpl);?>
" class="btn btn-sm btn-flat btn-primary btn-flat btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>&nbsp;
							<?php if ($_smarty_tpl->tpl_vars['l']->value->id!=1) {?><button type="button" class="btn btn-flat <?php if (!$_smarty_tpl->tpl_vars['l']->value->visible) {?>btn-default<?php } else { ?>btn-success active<?php }?> lang-enable" data-toggle="tooltip" title="Показывать на сайте"><i class="fa fa-lightbulb-o"></i></button>&nbsp;<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['l']->value->id!=1) {?><button type="button" class="btn btn-flat btn-danger delete" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash-o"></i></button><?php }?>
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
				<option value="enable">Отобразить на сайте</option>
				<option value="disable">Отключить на сайте</option>
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
</section><?php }} ?>
