<?php /* Smarty version Smarty-3.1.18, created on 2017-11-21 14:08:52
         compiled from "engine/templates/html/news/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5385475515a072183a71cc9-33874857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab301cc15d59768ac1406fdba9756d36f39dd35d' => 
    array (
      0 => 'engine/templates/html/news/news.tpl',
      1 => 1511266131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5385475515a072183a71cc9-33874857',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a072183ae3a02_66076581',
  'variables' => 
  array (
    'posts' => 0,
    'post' => 0,
    'keyword' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a072183ae3a02_66076581')) {function content_5a072183ae3a02_66076581($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новости', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('news', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('news', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/news.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1>Новости<small>Управление новостями</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Новости</li>
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
		  <h3 class="box-title" style="line-height:1.5">Список новостей</h3>
		  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PostAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить новость</b></a>
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
					<th>Название</th>
					<th>Дата создания</th>
					<th class="actions-cell">
						Действия
					</th>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['posts']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
				<tr>
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
" />
						<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['post']->value->position;?>
">
					</td>
					<td class="text-cell">
						<b><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PostAdmin','id'=>$_smarty_tpl->tpl_vars['post']->value->id),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></b>
					</td>
					<td class="text-cell">
						<b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
</b>
					</td>
					<td>
						<a href="../news/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
" class="btn btn-sm btn-primary preview btn-flat" title="Предпросмотр в новом окне"  target="_blank"><i class="fa fa-desktop"></i></a>
						<button class="enable btn btn-sm <?php if (!$_smarty_tpl->tpl_vars['post']->value->visible) {?>btn-default<?php } else { ?>btn-success act<?php }?> btn-flat" title="Активен" ><i class="fa fa-lightbulb-o"></i></button>
						<button class="delete btn btn-sm btn-danger btn-flat" title="Удалить" ><i class="fa fa-trash-o"></i></button>
					</td>
						
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="4">
						<b>Новости отсутствуют</b>
					</td>
				</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->		
	  </div>
	</div>
	  
	<div class="col-sm-12">
		<?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	  
	<div class="col-sm-2">
		<div class="form-group">
			<select id="action" class="form-control" name="action">
				<option value="enable">Сделать видимыми</option>
				<option value="disable">Сделать невидимыми</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
	</div>
	
	<div class="col-lg-2 col-md-2">
		<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
	</div>
	
  </div>
  <!-- /.row -->
</form>
</section>
	
	<!--<div id="search">
	<form method="get">
		<div class="form-group">
            <div class="input-group">
				<input type="hidden" name="module" value="NewsAdmin">
                <input class="form-control" id="appendedInputButton" name="keyword" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                <span class="input-group-btn">
					<button class="btn btn-secondary" type="submit" value=""><i class="fa fa-search"></i></button>
				</span>
			</div>
		</div>
	</form>
	</div>-->
<?php }} ?>
