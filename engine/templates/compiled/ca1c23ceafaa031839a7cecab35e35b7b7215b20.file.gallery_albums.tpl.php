<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 18:12:58
         compiled from "engine/templates/html/gallery/gallery_albums.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18264821485a07218a2c7151-90663901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca1c23ceafaa031839a7cecab35e35b7b7215b20' => 
    array (
      0 => 'engine/templates/html/gallery/gallery_albums.tpl',
      1 => 1500987812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18264821485a07218a2c7151-90663901',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'albums' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a07218a3372b5_14915297',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a07218a3372b5_14915297')) {function content_5a07218a3372b5_14915297($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/astyle/mdk.ua/www/Smarty/libs/plugins/modifier.date_format.php';
?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Альбомы', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('gallery', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('gallery_albums', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/gallery_albums.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1>Галлерея<small>Управление альбомами</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Альбомы</li>
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
		  <i class="fa fa-picture-o"></i>
		  <h3 class="box-title" style="line-height:1.5">Управление альбомами</h3>
		  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GalleryAlbumAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-sm btn-primary pull-right btn-flat"><i class="fa fa-plus"></i> <b> Добавить альбом</b></a>
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
						<th class="thumbnail-cell">Превью</th>
						<th>Название</th>
						<th class="actions-cell">Действия</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($_smarty_tpl->tpl_vars['albums']->value) {?>
					<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['albums']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
					<tr class="c_item">
						<td class="move-cell">
							<input name="positions[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->id, ENT_QUOTES, 'UTF-8', true);?>
]" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" />
							<div class="move_zone" style=" width: 20px; cursor:pointer; float:left;"><i class="fa fa-bars" style="font-size: 24px;"></i></div>
						</td>
						<td class="checkbox-cell">
							<input type="checkbox" class="minimal" name="check[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
						</td>
						<td class="thumbnail-cell">
							<?php if ($_smarty_tpl->tpl_vars['a']->value->preview) {?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GalleryAlbumAdmin','id'=>$_smarty_tpl->tpl_vars['a']->value->id),$_smarty_tpl);?>
"><img src="/files/gallery/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['a']->value->created,'%Y');?>
/<?php echo $_smarty_tpl->tpl_vars['a']->value->preview;?>
"></a><?php } else { ?><div class="empty-thumbnail"><i class="fa fa-file-image-o"></i></div><?php }?>
						</td>
						<td class="text-cell">
							<b><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GalleryAlbumAdmin','id'=>$_smarty_tpl->tpl_vars['a']->value->id),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></b>
						</td>
						<td class="actions-cell">
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GalleryAlbumAdmin','id'=>$_smarty_tpl->tpl_vars['a']->value->id),$_smarty_tpl);?>
" class="btn btn-sm btn-flat btn-primary btn-flat btn-actions" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>&nbsp;
							<button type="button" class="btn btn-flat <?php if (!$_smarty_tpl->tpl_vars['a']->value->visible) {?>btn-default<?php } else { ?>btn-success active<?php }?> lang-enable" data-toggle="tooltip" title="Показывать на сайте"><i class="fa fa-lightbulb-o"></i></button>&nbsp;
							<button type="button" class="btn btn-flat btn-danger delete" data-toggle="tooltip" title="Удалить"><i class="fa fa-trash-o"></i></button>
						</td>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr>
						<td colspan="5">
							<b>Альбомы не найдены</b>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>			
		</div>
		<!-- /.box-body -->		
	  </div>
	  <!-- /.box -->
	  <?php if ($_smarty_tpl->tpl_vars['albums']->value) {?>
	  <div class="row">
		<div class="form-group col-md-2">
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
	  <?php }?>
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</form>
</section><?php }} ?>
