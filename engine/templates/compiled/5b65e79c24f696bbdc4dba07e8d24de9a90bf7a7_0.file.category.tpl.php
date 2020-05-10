<?php
/* Smarty version 3.1.32, created on 2020-03-05 22:16:44
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e615e2c58dcb5_09519285',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b65e79c24f696bbdc4dba07e8d24de9a90bf7a7' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/products/category.tpl',
      1 => 1583439402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:editor/tinymce_init.tpl' => 1,
  ),
),false)) {
function content_5e615e2c58dcb5_09519285 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'category_select' => 
  array (
    'compiled_filepath' => '/home/astyle/a-style.kh.ua/dev2/engine/templates/compiled/5b65e79c24f696bbdc4dba07e8d24de9a90bf7a7_0.file.category.tpl.php',
    'uid' => '5b65e79c24f696bbdc4dba07e8d24de9a90bf7a7',
    'call_name' => 'smarty_template_function_category_select_9009807685e615e2c536738_21216648',
  ),
));
if ($_smarty_tpl->tpl_vars['main_language']->value->id != $_smarty_tpl->tpl_vars['language']->value->id) {
$_smarty_tpl->_assignInScope('meta_title', 'Перевод категории' ,false ,8);
} elseif ($_smarty_tpl->tpl_vars['category']->value->id) {
$_smarty_tpl->_assignInScope('meta_title', $_smarty_tpl->tpl_vars['category']->value->name ,false ,8);
} else {
$_smarty_tpl->_assignInScope('meta_title', 'Новая категория' ,false ,8);
}
$_smarty_tpl->_assignInScope('sm_groupe', "products" ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', "categories" ,false ,8);?>

<?php $_smarty_tpl->_subTemplateRender('file:editor/tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>		
	$('.del-preview').on('click',function(){
		$('.page-preview').hide();
		$('.preview-placeholder').show();
		$('#del_preview').val(1);
	});
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-format-list-bulleted s-6"></i>
					</span>
					<span class="logo-text h4"><?php if ($_smarty_tpl->tpl_vars['main_language']->value->id != $_smarty_tpl->tpl_vars['language']->value->id) {?>Перевод категории<?php } elseif ($_smarty_tpl->tpl_vars['category']->value->id) {
echo $_smarty_tpl->tpl_vars['category']->value->name;
} else { ?>Новая категория<?php }?></span>
				</div>
			</div>
		</div>
		<?php if (count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
		<div class="col-auto">
			<div class="d-flex align-items-center justify-content-end">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
					<option value='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'CategoryAdmin','language_id'=>$_smarty_tpl->tpl_vars['l']->value->id,'id'=>$_smarty_tpl->tpl_vars['category']->value->id,'return'=>null),$_smarty_tpl ) );?>
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
	<input name="id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->id, ENT_QUOTES, 'UTF-8', true);?>
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
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'added') {?>Категория добавлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'updated') {?>Категория обновлена<?php }?>",
						  stack: {dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}
						});
					});   
				<?php echo '</script'; ?>
> 
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
				<?php echo '<script'; ?>
>  
					$(document).ready(function(){   
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.error({
						  title: 'Ой, что то не так...',
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_error']->value == 'url_exists') {?>Категория с таким адресом уже существует<?php }?>",
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
											<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название категории" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="name">Название категории</label>
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
									<div class="col-12 d-flex align-items-center mb-3">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" <?php if ($_smarty_tpl->tpl_vars['category']->value->visible) {?>checked<?php }?>>
												<span class="checkbox-icon fuse-ripple-ready text-green"></span>
												<span class="form-check-description">Активна</span>
											</label>
										</div>
									</div>
									<div class="form-row col-12 align-items-center">
										<div class="col-12">
											<label class="sr-only" for="url">Адрес</label>
											<div class="input-group mb-3">
												<div class="input-group-addon">/catalog/</div>
												<input type="text" class="form-control" id="url" name="url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Адрес">
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group pt-0 mb-1">
											<label for="parent_id" class="col-form-label pb-0">Родительская страница</label>
											<select class="form-control" id="parent_id" name="parent_id">
												<option value='0'>Корневая категория</option>
												
												<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'category_select', array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>0), true);?>

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
					
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Параметры SEO</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_title" name="meta_title" aria-describedby="meta_titleHelp" placeholder="Введите заголовок категории" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="meta_title">Заголовок категории</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
" aria-describedby="meta_keywordsHelp" placeholder="Введите ключевые слова через запятую">
											<label for="meta_keywords">Ключевые слова</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<textarea class="form-control p-2" id="meta_description" name="meta_description" id="meta_description" rows="4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
											<label for="meta_description">Мета-описание категории</label>
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
					
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Превью категории</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex justify-content-center align-items-center">
										<?php if ($_smarty_tpl->tpl_vars['category']->value->image) {?><img class="page-preview" src="/files/category/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->image, ENT_QUOTES, 'UTF-8', true);?>
" style="max-height: 320px; max-width:100%; height:100%; width:auto;"><?php }?>
										<img class="preview-placeholder" src="./templates/img/placeholder.png" width="100%" height="auto" <?php if ($_smarty_tpl->tpl_vars['category']->value->image) {?>style="display:none;"<?php }?>>
									</div>
									<div class="col-8 pt-3 mb-3">
										 <div class="form-group mb-0 p-0">
											<input type="hidden" name="image_old" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->image, ENT_QUOTES, 'UTF-8', true);?>
">
											<input type="hidden" id="del_preview" name="del_preview" value="0">
											<input type="file" name="image">
										 </div>
									</div>
									
									<div class="col-4 pt-3 mb-3">
										 <div class="form-group m-0 p-0 text-right" >
											<i class="icon-trash del-preview text-red" data-toggle="tooltip" data-placement="bottom" title="Удалить превью"></i>
										 </div>
									</div>
									
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="preview_width" name="preview_width" value="<?php if ($_smarty_tpl->tpl_vars['category']->value->preview_width) {
echo $_smarty_tpl->tpl_vars['category']->value->preview_width;
} else {
echo $_smarty_tpl->tpl_vars['settings']->value->category_preview_width;
}?>">
											<label for="preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="preview_height" name="preview_height" value="<?php if ($_smarty_tpl->tpl_vars['category']->value->preview_height) {
echo $_smarty_tpl->tpl_vars['category']->value->preview_height;
} else {
echo $_smarty_tpl->tpl_vars['settings']->value->category_preview_height;
}?>">
											<label for="preview_height">Макс. высота, px</label>
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
					
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Текст категории</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<textarea name="description" rows="20" class="form-control editor_large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
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
/* smarty_template_function_category_select_9009807685e615e2c536738_21216648 */
if (!function_exists('smarty_template_function_category_select_9009807685e615e2c536738_21216648')) {
function smarty_template_function_category_select_9009807685e615e2c536738_21216648(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('level'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>
 
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
													<?php if ($_smarty_tpl->tpl_vars['category']->value->id != $_smarty_tpl->tpl_vars['c']->value->id) {?>
														<option value='<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['category']->value->parent_id == $_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>><?php
$__section_sp_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_sp_0_total = $__section_sp_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sp'] = new Smarty_Variable(array());
if ($__section_sp_0_total !== 0) {
for ($__section_sp_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sp']->value['index'] = 0; $__section_sp_0_iteration <= $__section_sp_0_total; $__section_sp_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sp']->value['index']++){
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php
}
}
echo $_smarty_tpl->tpl_vars['c']->value->name;?>
</option>
														<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'category_select', array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), true);?>

													<?php }?>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
												<?php
}}
/*/ smarty_template_function_category_select_9009807685e615e2c536738_21216648 */
}
