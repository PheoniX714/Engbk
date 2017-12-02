<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 18:12:55
         compiled from "engine/templates/html/gallery/gallery_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7365585665a072187c47453-26622798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22c77e8cca40c29b1106f3e176fa2a0d7cf0b0c6' => 
    array (
      0 => 'engine/templates/html/gallery/gallery_categories.tpl',
      1 => 1500730237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7365585665a072187c47453-26622798',
  'function' => 
  array (
    'categories_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
    'level' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a072187d2f7b4_71648591',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a072187d2f7b4_71648591')) {function content_5a072187d2f7b4_71648591($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Список категорий галереи", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('gallery', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable("gallery_categories", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/gallery_categories.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1>Категории галереи</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Категории галереи</li>
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
			  <h3 class="box-title" style="line-height:1.5">Управление категориями</h3>
			  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GalleryCategoryAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить категорию</b></a>
			</div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">   
				<?php if (!function_exists('smarty_template_function_categories_tree')) {
    function smarty_template_function_categories_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['categories_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
				<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
				<ul class="sortable-list sortable">
					<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
					<li>
					  <input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->position;?>
">
					  <!-- drag handle -->
						<span class="handle" style="margin-left: <?php echo $_smarty_tpl->tpl_vars['level']->value*30;?>
px;">
							<i class="fa fa-bars" style="font-size: 20px;"></i>
						</span>
					  <!-- checkbox -->
					  <input type="checkbox" class="minimal" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
">
					  <!-- todo text -->
					  <span class="text"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GalleryCategoryAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></span>
					  <!-- General tools such as edit or delete-->
					  <div class="tools">
						<a href="../gallery/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
" class="btn btn-primary btn-sm btn-flat" target="_blank"><i class="fa fa-desktop"></i></a>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'GalleryCategoryAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
						<button class="btn btn-sm <?php if (!$_smarty_tpl->tpl_vars['category']->value->visible) {?>btn-default<?php } else { ?>btn-success enbl<?php }?> enable btn-flat" title="Активна"><i class="fa fa-lightbulb-o"></i></button>
						<button class="btn btn-sm btn-danger delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
					  </div>
					</li>
					<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

					<?php } ?>
				</ul>
				<?php }?>
				<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

				
				<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
				<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>0));?>

				<?php } else { ?>
					<ul class="sortable-list sortable">
						<li><b>Категории отсутствуют</b></li>
					</ul>
				<?php }?>
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
</section><?php }} ?>
