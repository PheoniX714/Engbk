<?php
/* Smarty version 3.1.32, created on 2020-03-04 10:40:32
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/pages/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e5f6980b5d001_26973881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '492a8e76e6b68373f92c2a8a80d18eb6690a0e02' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/pages/page.tpl',
      1 => 1583244617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:editor/tinymce_init.tpl' => 1,
  ),
),false)) {
function content_5e5f6980b5d001_26973881 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('sm_groupe', 'pages' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', "menu_".((string)$_smarty_tpl->tpl_vars['page']->value->menu_id) ,false ,8);
if ($_smarty_tpl->tpl_vars['page']->value->id) {
$_smarty_tpl->_assignInScope('meta_title', $_smarty_tpl->tpl_vars['page']->value->name ,false ,8);
} else {
$_smarty_tpl->_assignInScope('meta_title', 'Новая страница' ,false ,8);
}?>

<?php $_smarty_tpl->_subTemplateRender('file:editor/tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
	$(function () {		
		$(".images-list").sortable({
			items:".image-box",
			tolerance:"pointer",
			scrollSensitivity:40,
			opacity:0.7
		});
		
		// Удаление изображения
		$('.images-list').on('click', '.delete_image', function() {
			$(this).closest(".image-box").fadeOut(200, function() { $(this).remove(); });
			return false;
		});
		
		$('.page-content').on('click', '#copy_url', function() {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($('#page_url').attr('href')).select();
			document.execCommand("copy");
			$temp.remove();
		});
	});
		
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
						<i class="icon-file s-6"></i>
					</span>
					<span class="logo-text h4"><?php if ($_smarty_tpl->tpl_vars['page']->value->id) {
echo $_smarty_tpl->tpl_vars['page']->value->name;
} else { ?>Новая страница<?php }?></span>
				</div>
			</div>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['page']->value->id) {?>
		<div class="col-auto">
			<div class="d-flex align-items-center justify-content-end">
				<div class="mr-4">Язык:</div>
				<select id="language_id" class="form-control" style="min-width:100px;" onchange="if (this.value) window.location.href=this.value">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
					<option value='<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'PageAdmin','id'=>$_smarty_tpl->tpl_vars['page']->value->id,'language_id'=>$_smarty_tpl->tpl_vars['l']->value->id,'return'=>null),$_smarty_tpl ) );?>
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
	<input name="id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->id, ENT_QUOTES, 'UTF-8', true);?>
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
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'added') {?>Страница добавлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'updated') {?>Страница обновлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'added_translation') {?>Перевод добавлен<?php }?>",
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
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_error']->value == 'url_exists') {?>Страница с таким адресом уже существует<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value == 'empty_name') {?>Не задано название страницы<?php }?>",
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
											<input type="text" class="form-control form-control-lg" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название страницы" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="name">Название страницы</label>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				
					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Основные параметры</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex align-items-center">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" <?php if ($_smarty_tpl->tpl_vars['system']->value) {?>disabled<?php }?> <?php if ($_smarty_tpl->tpl_vars['page']->value->visible) {?>checked<?php }?>>
												<span class="checkbox-icon fuse-ripple-ready text-green"></span>
												<span class="form-check-description">Активна</span>
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
										<div class="form-group pt-0 mb-1">
											<label for="menu_id" class="col-form-label pb-0">Меню</label>
											<select class="form-control" id="menu_id" name="menu_id">
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menus']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
												<option value='<?php echo $_smarty_tpl->tpl_vars['m']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['page']->value->menu_id == $_smarty_tpl->tpl_vars['m']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['m']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</select>
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
												<option value='0' <?php if ($_smarty_tpl->tpl_vars['p']->value->id == $_smarty_tpl->tpl_vars['page']->value->parent_id) {?>selected<?php }?>>Корневая страница</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pages']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
												<?php if ($_smarty_tpl->tpl_vars['page']->value->id != $_smarty_tpl->tpl_vars['p']->value->id) {?><option value='<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['p']->value->id == $_smarty_tpl->tpl_vars['page']->value->parent_id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option><?php }?>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<label for="url">URL</label>
										<div class="input-group mb-3">
											<span class="input-group-addon"><?php if ($_smarty_tpl->tpl_vars['language']->value->main != 1) {?>/<?php echo $_smarty_tpl->tpl_vars['language']->value->code;
}?>/</span>
											<input type="text" class="form-control" id="url" name="url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Адрес">
										</div>
									
										<?php if ($_smarty_tpl->tpl_vars['page']->value->url || $_smarty_tpl->tpl_vars['page']->value->id == 1) {?>
										<a id="page_url" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;
if ($_smarty_tpl->tpl_vars['language']->value->main != 1) {?>/<?php echo $_smarty_tpl->tpl_vars['language']->value->code;
}?>/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" target="__blank" class="btn btn-secondary btn-sm mb-3 mb-sm-0"><i class="icon-open-in-new btn-sm p-0"></i> открыть на сайте</a>
										<button id="copy_url" type="button" class="btn btn-secondary btn-sm mb-3 mb-sm-0"><i class="icon-content-copy btn-sm p-0"></i> копировать url</button>	
										<?php }?>
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
					
					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Параметры SEO</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_title" name="meta_title" aria-describedby="meta_titleHelp" placeholder="Введите заголовок страницы" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="meta_title">Заголовок страницы</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
" aria-describedby="meta_keywordsHelp" placeholder="Введите ключевые слова через запятую">
											<label for="meta_keywords">Ключевые слова</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<textarea class="form-control p-2" id="meta_description" name="meta_description" id="meta_description" rows="4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
											<label for="meta_description">Мета-описание страницы</label>
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
					
					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Превью страницы</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12 d-flex justify-content-center align-items-center">
										<?php if ($_smarty_tpl->tpl_vars['page']->value->image) {?><img class="page-preview" src="/files/pages/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->image, ENT_QUOTES, 'UTF-8', true);?>
" style="max-height: 320px; max-width:100%; height:100%; width:auto;"><?php }?>
										<img class="preview-placeholder" src="./templates/img/placeholder.png" width="100%" height="auto" <?php if ($_smarty_tpl->tpl_vars['page']->value->image) {?>style="display:none;"<?php }?>>
									</div>
									
									<div class="col-8 pt-3 mb-3">
										 <div class="form-group mb-0 p-0">
											<input type="hidden" name="image_old" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->image, ENT_QUOTES, 'UTF-8', true);?>
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
											<input type="text" class="form-control" id="preview_width" name="preview_width" value="<?php if ($_smarty_tpl->tpl_vars['page']->value->preview_width) {
echo $_smarty_tpl->tpl_vars['page']->value->preview_width;
} else {
echo $_smarty_tpl->tpl_vars['settings']->value->page_preview_width;
}?>">
											<label for="preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="preview_height" name="preview_height" value="<?php if ($_smarty_tpl->tpl_vars['page']->value->preview_height) {
echo $_smarty_tpl->tpl_vars['page']->value->preview_height;
} else {
echo $_smarty_tpl->tpl_vars['settings']->value->page_preview_height;
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
						<div class="card mb-5">
							<div class="card-header">
								<b>Дополнительные изображения страницы</b> <?php if ($_smarty_tpl->tpl_vars['page_images']->value) {?><span class="badge badge-info"><?php echo count($_smarty_tpl->tpl_vars['page_images']->value);?>
 изображен<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'plural' ][ 0 ], array( $_smarty_tpl->tpl_vars['page_images']->value,'ия','ие','ий' ));?>
</span><?php }?>
							</div>
							<div class="card-body">
								<div class="images-list d-flex flex-wrap mb-5">
									<?php if ($_smarty_tpl->tpl_vars['page_images']->value) {?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page_images']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
									<div class="image-box">
										<div class="image">
											<img src="/files/page_images/<?php echo $_smarty_tpl->tpl_vars['i']->value->filename;?>
" style="max-width:150px;max-height:140px;">
											<input name="positions[]" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value->id, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" />
											<button type="button" class="btn btn-icon delete_image" data-toggle="tooltip" data-placement="bottom" title="Удалить изображение">
												<i class="icon icon-close text-red"></i>
											</button>
										</div>
									</div>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									<?php } else { ?>
									
									<?php }?>
								</div>
								<div class="row">
									<div class="col-12 px-8 text-right">
										<input type="file"  name="page_images[]" multiple>
										<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit">Сохранить</button>
									</div> 
								</div>
							</div>
						</div>
					</div>
					 
					<div class="col-12 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Текст страницы</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<textarea name="text" rows="20" class="form-control editor_large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->text, ENT_QUOTES, 'UTF-8', true);?>
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
}
