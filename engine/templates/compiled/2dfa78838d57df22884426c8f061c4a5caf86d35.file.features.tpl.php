<?php /* Smarty version Smarty-3.1.18, created on 2017-11-11 18:12:42
         compiled from "engine/templates/html/products/features.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5060570295a07217a199907-53254962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dfa78838d57df22884426c8f061c4a5caf86d35' => 
    array (
      0 => 'engine/templates/html/products/features.tpl',
      1 => 1507811916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5060570295a07217a199907-53254962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'features' => 0,
    'feature' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a07217a234b23_70986666',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a07217a234b23_70986666')) {function content_5a07217a234b23_70986666($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Свойства товаров", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('catalog', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable("product-features", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/product_features.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1>Свойства товаров</h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Свойства товаров</li>
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
			  <h3 class="box-title" style="line-height:1.5">Управление свойствами</h3>
			  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'FeatureAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-plus"></i> <b> Добавить свойство</b></a>
			</div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">   
				<?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
				<ul class="sortable-list sortable">
					<?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
					<li>
					  <input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['feature']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['feature']->value->position;?>
">
					  <!-- drag handle -->
					  <span class="handle"><i class="fa fa-bars" style="font-size: 20px;"></i></span>
					  <!-- checkbox -->
					  <input type="checkbox" class="minimal" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['feature']->value->id;?>
">
					  <!-- todo text -->
					  <span class="text"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'FeatureAdmin','id'=>$_smarty_tpl->tpl_vars['feature']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></span>
					  <!-- General tools such as edit or delete-->
					  <div class="tools">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'FeatureAdmin','id'=>$_smarty_tpl->tpl_vars['feature']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
						<button class="btn btn-sm <?php if (!$_smarty_tpl->tpl_vars['feature']->value->in_filter) {?>btn-default<?php } else { ?>btn-success enbl<?php }?> in_filter btn-flat" title="Использовать в фильтре"><i class="fa fa-filter"></i></button>
						<button class="btn btn-sm btn-danger delete btn-flat" title="Удалить"><i class="fa fa-trash-o"></i></button>
					  </div>
					</li>
					<?php } ?>
				</ul>
				<?php } else { ?>
					<ul class="sortable-list sortable">
						<li><b>Свойства отсутствуют</b></li>
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
				<option value="set_in_filter">Использовать в фильтре</option>
					<option value="unset_in_filter">Не использовать в фильтре</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
		  
		<div class="col-md-2">
			<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
		</div>
	  </div>
	</form>
</section><?php }} ?>
