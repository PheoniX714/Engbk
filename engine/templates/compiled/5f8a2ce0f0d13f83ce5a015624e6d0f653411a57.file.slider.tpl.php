<?php /* Smarty version Smarty-3.1.18, created on 2017-11-21 17:40:15
         compiled from "engine/templates/html/slider/slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11051072045a143a3a317b92-06987605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f8a2ce0f0d13f83ce5a015624e6d0f653411a57' => 
    array (
      0 => 'engine/templates/html/slider/slider.tpl',
      1 => 1511278812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11051072045a143a3a317b92-06987605',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a143a3a3735f5_29484535',
  'variables' => 
  array (
    'slides' => 0,
    'slide' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a143a3a3735f5_29484535')) {function content_5a143a3a3735f5_29484535($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Слайдер', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>

<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('slider', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/slider.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1>Слайдер</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Слайдер</li>
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
		  <h3 class="box-title" style="line-height:1.5">Управление слайдами</h3>
		  <a href="index.php?module=SlideAdmin" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить слайд</b></a>
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
					<th>Изображение</th>
					<th class="actions-cell">Действия</th>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['slides']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
				<tr class="c_item">
					<td style="line-height:120px; text-align:center; width:40px;">
						<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['slide']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value->position;?>
">
						<div class="move_zone" style="width: 20px; cursor:pointer; float:left;"><i class="fa fa-bars" style="font-size: 24px;"></i></div>
					</td>
					<td class="checkbox-column" style="line-height:120px;">
						<input type="checkbox" class="minimal" name="check[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
					</td>
					<td style="line-height:30px;">
						<?php if ($_smarty_tpl->tpl_vars['slide']->value->filename) {?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'SlideAdmin','id'=>$_smarty_tpl->tpl_vars['slide']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/files/uploads/<?php echo $_smarty_tpl->tpl_vars['slide']->value->filename;?>
" style="max-width: 500px; max-height:120px;"></a><?php }?>
					</td>
					<td style="line-height:120px;">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'SlideAdmin','id'=>$_smarty_tpl->tpl_vars['slide']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-pencil"></i></a>
						<button class="btn btn-sm btn-flat <?php if (!$_smarty_tpl->tpl_vars['slide']->value->visible) {?>btn-default<?php } else { ?>btn-success act<?php }?> enable" title="Активна"><i class="fa fa-lightbulb-o"></i></button>
						<button class="btn btn-sm btn-flat btn-danger delete" title="Удалить"><i class="fa fa-trash-o"></i></button>
					</td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="4">
						Слайдов нет
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
		<div class="form-group col-lg-2">
			<select id="action" class="form-control" name="action">
				<option value="enable">Сделать видимыми</option>
				<option value="disable">Сделать невидимыми</option>
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
