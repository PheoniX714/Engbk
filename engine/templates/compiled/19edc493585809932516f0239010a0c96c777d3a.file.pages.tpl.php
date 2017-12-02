<?php /* Smarty version Smarty-3.1.18, created on 2017-11-21 14:22:52
         compiled from "engine/templates/html/pages/pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17360061795a06d8ac2c3489-58601504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19edc493585809932516f0239010a0c96c777d3a' => 
    array (
      0 => 'engine/templates/html/pages/pages.tpl',
      1 => 1511266882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17360061795a06d8ac2c3489-58601504',
  'function' => 
  array (
    'pages_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a06d8ac344ff2_59302733',
  'variables' => 
  array (
    'menu' => 0,
    'menus' => 0,
    'm' => 0,
    'pages' => 0,
    'page' => 0,
    'level' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06d8ac344ff2_59302733')) {function content_5a06d8ac344ff2_59302733($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['menu']->value->name), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('pages', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable("menu_".((string)$_smarty_tpl->tpl_vars['menu']->value->id), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/pages.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['m']->value->id==$_smarty_tpl->tpl_vars['menu']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['menu']->value->name;?>
<?php }?><?php } ?><small>Статические страницы</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active"><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['m']->value->id==$_smarty_tpl->tpl_vars['menu']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['menu']->value->name;?>
<?php }?><?php } ?></li>
	</ol>
</section>

	<!-- Main content -->
    <section class="content">
	<form id="list_form" method="post">
	<!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
			  <i class="fa fa-files-o"></i>
			  <h3 class="box-title" style="line-height:1.5">Управление страницами</h3>
			  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PageAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить страницу</b></a>
			</div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">   
				<?php if (!function_exists('smarty_template_function_pages_tree')) {
    function smarty_template_function_pages_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['pages_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
				<?php if ($_smarty_tpl->tpl_vars['pages']->value) {?>
				<ul class="sortable-list sortable">
					<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
					<li>
					  <input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['page']->value->position;?>
">
					  <!-- drag handle -->
						<span class="handle" style="margin-left: <?php echo $_smarty_tpl->tpl_vars['level']->value*30;?>
px;">
							<i class="fa fa-bars" style="font-size: 20px;"></i>
						</span>
					  <!-- checkbox -->
					  <input type="checkbox" class="minimal" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
">
					  <!-- todo text -->
					  <span class="text"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PageAdmin','id'=>$_smarty_tpl->tpl_vars['page']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></span>
					  <!-- General tools such as edit or delete-->
					  <div class="tools">
						<a href="../<?php echo $_smarty_tpl->tpl_vars['page']->value->url;?>
" class="btn btn-primary btn-sm btn-flat" target="_blank"><i class="fa fa-desktop"></i></a>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PageAdmin','id'=>$_smarty_tpl->tpl_vars['page']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
" class="btn btn-primary btn-sm btn-flat" target="_blank"><i class="fa fa-edit"></i></a>
						<button class="btn btn-sm <?php if (!$_smarty_tpl->tpl_vars['page']->value->visible) {?>btn-default<?php } else { ?>btn-success enbl<?php }?> enable btn-flat" title="Активна"><i class="fa fa-lightbulb-o"></i></button>
						<button class="btn btn-sm btn-danger l-delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
					  </div>
					</li>
					<?php smarty_template_function_pages_tree($_smarty_tpl,array('pages'=>$_smarty_tpl->tpl_vars['page']->value->subpages,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

					<?php } ?>
				</ul>
				<?php }?>
				<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

				<?php smarty_template_function_pages_tree($_smarty_tpl,array('pages'=>$_smarty_tpl->tpl_vars['pages']->value,'level'=>0));?>
	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
	  <div class="row">
		<div class="form-group col-md-3 col-lg-2">
			<select id="action" class="form-control" name="action">
				<option value="">Выберите действие</option>
				<option value="enable">Отобразить на сайте</option>
				<option value="disable">Отключить на сайте</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
		  
		<div class="col-md-2">
			<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
		</div>
	  </div>
	</form>
	</section>

<?php }} ?>
