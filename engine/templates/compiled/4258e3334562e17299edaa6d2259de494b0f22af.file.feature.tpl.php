<?php /* Smarty version Smarty-3.1.18, created on 2017-11-16 22:46:03
         compiled from "engine/templates/html/products/feature.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20009880715a0b358c43a4f1-67751184%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4258e3334562e17299edaa6d2259de494b0f22af' => 
    array (
      0 => 'engine/templates/html/products/feature.tpl',
      1 => 1510865162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20009880715a0b358c43a4f1-67751184',
  'function' => 
  array (
    'category_select' => 
    array (
      'parameter' => 
      array (
        'selected_id' => NULL,
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0b358c4f7bb0_54820845',
  'variables' => 
  array (
    'feature' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'languages' => 0,
    'l' => 0,
    'product_category' => 0,
    'categories' => 0,
    'category' => 0,
    'feature_categories' => 0,
    'level' => 0,
    'selected_id' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b358c4f7bb0_54820845')) {function content_5a0b358c4f7bb0_54820845($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['feature']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['feature']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новое свойство', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>
<?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('catalog', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable("product_features", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>

<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php if ($_smarty_tpl->tpl_vars['feature']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['feature']->value->name;?>
<?php } else { ?>Новое свойство<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="index.php?module=FeaturesAdmin">Свойства товаров</a></li>
		<li class="active"><?php if ($_smarty_tpl->tpl_vars['feature']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['feature']->value->name;?>
<?php } else { ?>Новое свойство<?php }?></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Свойство добавлено<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Свойство обновлено<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_success']->value;?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Свойство с таким адресом уже существует<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div class="col-md-6">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'FeatureAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще свойство</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-8">
						<label for="name">Название свойства</label>
						<input type="text" id="name" class="form-control" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
						<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
					</div>
					<div class="form-group col-sm-4">
						<div class="checkbox" style="margin-top:30px;">
							<label>
								<input type="checkbox" class="icheck-input" name="in_filter" id="in_filter" <?php if ($_smarty_tpl->tpl_vars['feature']->value->in_filter) {?>checked<?php }?> value="1">
								Использовать в фильтре
							</label>
						</div>
					</div>
					<div class="form-group col-sm-4">
						<label for="language_id">Использовать для языка</label>
						<select id="language_id" class="form-control" name="language_id" style="padding: 4px 12px; margin-right:15px; cursor:pointer;" <?php if (!$_smarty_tpl->tpl_vars['feature']->value->id) {?>disabled<?php }?>>
							<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['feature']->value->language_id==$_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
								<?php if (!$_smarty_tpl->tpl_vars['feature']->value->id) {?><?php break 1?><?php }?>
							<?php } ?>
						</select>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Использовать в категориях</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<label for="name">Выводить фильтр по свойству в категориях:</label>
					<select class="form-control" multiple name="feature_categories[]" style="height:400px;">
						<?php if (!function_exists('smarty_template_function_category_select')) {
    function smarty_template_function_category_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['category_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
						<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
							<option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
' <?php if (in_array($_smarty_tpl->tpl_vars['category']->value->id,$_smarty_tpl->tpl_vars['feature_categories']->value)) {?>selected<?php }?> category_name='<?php echo $_smarty_tpl->tpl_vars['category']->value->single_name;?>
'><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['name'] = 'sp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total']);
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
</option>
								<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'selected_id'=>$_smarty_tpl->tpl_vars['selected_id']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

						<?php } ?>
						<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

						<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value));?>

					</select>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		</form>
	</div>
</section><?php }} ?>
