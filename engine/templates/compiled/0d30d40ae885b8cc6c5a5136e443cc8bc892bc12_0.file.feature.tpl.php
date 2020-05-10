<?php
/* Smarty version 3.1.32, created on 2020-03-05 22:27:00
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/feature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e616094cb8f43_33521508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d30d40ae885b8cc6c5a5136e443cc8bc892bc12' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/feature.tpl',
      1 => 1583440016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:editor/tinymce_init.tpl' => 1,
  ),
),false)) {
function content_5e616094cb8f43_33521508 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'category_select' => 
  array (
    'compiled_filepath' => '/home/astyle/a-style.kh.ua/dev2/engine/templates/compiled/0d30d40ae885b8cc6c5a5136e443cc8bc892bc12_0.file.feature.tpl.php',
    'uid' => '0d30d40ae885b8cc6c5a5136e443cc8bc892bc12',
    'call_name' => 'smarty_template_function_category_select_13597491465e616094c6be91_88521333',
  ),
));
if ($_smarty_tpl->tpl_vars['feature']->value->id) {
$_smarty_tpl->_assignInScope('meta_title', $_smarty_tpl->tpl_vars['feature']->value->name ,false ,8);
} else {
$_smarty_tpl->_assignInScope('meta_title', 'Новое свойство' ,false ,8);
}
$_smarty_tpl->_assignInScope('sm_groupe', 'products' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', "features" ,false ,8);?>

<?php $_smarty_tpl->_subTemplateRender('file:editor/tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-filter s-6"></i>
					</span>
					<span class="logo-text h4"><?php if ($_smarty_tpl->tpl_vars['feature']->value->id) {
echo $_smarty_tpl->tpl_vars['feature']->value->name;
} else { ?>Новое свойство<?php }?></span>
				</div>
			</div>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['feature']->value->id) {?>
		<div class="col-auto">
			<div class="d-flex align-items-center justify-content-end">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
					<option value='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'FeatureAdmin','id'=>$_smarty_tpl->tpl_vars['feature']->value->id,'language_id'=>$_smarty_tpl->tpl_vars['l']->value->id,'return'=>null),$_smarty_tpl ) );?>
' <?php if ($_smarty_tpl->tpl_vars['language']->value->id == $_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>				
				</select>
			</div>
		</div>
		<?php }?>
	</div>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<input name="id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
		
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
				
				<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
				<?php echo '<script'; ?>
>  
					$(document).ready(function(){  
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.success({
						  title: 'Готово!',
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'added') {?>Свойство добавлено<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'updated') {?>Свойство обновлено<?php } else {
echo $_smarty_tpl->tpl_vars['message_success']->value;
}?>",
						  stack: {dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}
						});
					});   
				<?php echo '</script'; ?>
> 
				<?php }?>
								
				<div class="row">	
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group mb-1">
											<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название свойства" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value->name, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="name">Название свойства</label>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Основные параметры</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex align-items-center">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="in_filter" <?php if ($_smarty_tpl->tpl_vars['feature']->value->in_filter) {?>checked<?php }?>>
												<span class="checkbox-icon fuse-ripple-ready text-green"></span>
												<span class="form-check-description">Использовать в фильтре</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="feature_categories">Выводить фильтр по свойству в категориях:</label>
											<select  multiple name="feature_categories[]" class="form-control " id="feature_categories">
												
												<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'category_select', array('categories'=>$_smarty_tpl->tpl_vars['categories']->value), true);?>

											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-12 text-right">
										<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div><?php }
/* smarty_template_function_category_select_13597491465e616094c6be91_88521333 */
if (!function_exists('smarty_template_function_category_select_13597491465e616094c6be91_88521333')) {
function smarty_template_function_category_select_13597491465e616094c6be91_88521333(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('selected_id'=>$_smarty_tpl->tpl_vars['product_category']->value,'level'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
												<option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
' <?php if (in_array($_smarty_tpl->tpl_vars['category']->value->id,$_smarty_tpl->tpl_vars['feature_categories']->value)) {?>selected<?php }?> category_name='<?php echo $_smarty_tpl->tpl_vars['category']->value->single_name;?>
'><?php
$__section_sp_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_sp_0_total = $__section_sp_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sp'] = new Smarty_Variable(array());
if ($__section_sp_0_total !== 0) {
for ($__section_sp_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sp']->value['index'] = 0; $__section_sp_0_iteration <= $__section_sp_0_total; $__section_sp_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sp']->value['index']++){
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php
}
}
echo $_smarty_tpl->tpl_vars['category']->value->name;?>
</option>
														<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'category_select', array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'selected_id'=>$_smarty_tpl->tpl_vars['selected_id']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), true);?>

												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												<?php
}}
/*/ smarty_template_function_category_select_13597491465e616094c6be91_88521333 */
}
