<?php
/* Smarty version 3.1.32, created on 2020-03-05 16:51:12
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/slider/slide.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e6111e0ad5227_68103863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bac94d097e669c8b94cc01426103da5f9ed9e148' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/slider/slide.tpl',
      1 => 1583419870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:editor/tinymce_init.tpl' => 1,
  ),
),false)) {
function content_5e6111e0ad5227_68103863 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('sm_groupe', 'slider' ,false ,8);
if ($_smarty_tpl->tpl_vars['slide']->value->filename) {
$_smarty_tpl->_assignInScope('meta_title', 'Редактирование слайда' ,false ,8);
} else {
$_smarty_tpl->_assignInScope('meta_title', 'Добавление слайда' ,false ,8);
}?>

<?php $_smarty_tpl->_subTemplateRender('file:editor/tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-account s-6"></i>
					</span>
					<span class="logo-text h4"><?php if ($_smarty_tpl->tpl_vars['slide']->value->filename) {?>Редактирование слайда<?php } else { ?>Добавление слайда<?php }?></span>
				</div>
			</div>
		</div>
	</div>
	
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<input name="id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
		
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group row no-gutters">
				
				<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
				<?php echo '<script'; ?>
>  
					$(document).ready(function(){  
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.success({
						  title: 'Готово!',
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'added') {?>Слайд добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'updated') {?>Слайд обновлен<?php }?>",
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
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_error']->value == 'watermark_is_not_writable') {?>Установите права на запись для файла <?php echo $_smarty_tpl->tpl_vars['config']->value->watermark_file;
}?>",
						  stack: {dir1: 'up', dir2: 'left', 'firstpos1': 25, 'firstpos2': 25}
						});
					});   
				<?php echo '</script'; ?>
>
				<?php }?>
			
				<div class="col-12 col-sm-6 col-md-4 p-3">

					<div class="card mb-3"> 
						<img class="card-img-top" style="width:100%;" src="<?php if ($_smarty_tpl->tpl_vars['slide']->value->filename) {?>/files/slider/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->filename, ENT_QUOTES, 'UTF-8', true);
} else { ?>/engine/templates/img/placeholder.png<?php }?>" >
						
						<div class="widget-content row px-4 pt-6">						
							<div class="col-12 col-sm-8 p-4">
								 <div class="form-group mb-0">
									<input type="file" class="custom-file-input" id="slide_img" name="image">
									<label class="custom-file-label" for="slide_img"><?php if ($_smarty_tpl->tpl_vars['slide']->value->filename) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->filename, ENT_QUOTES, 'UTF-8', true);
} else { ?>Изображение слайда<?php }?></label>
								 </div>
							</div>
							
							<?php echo '<script'; ?>
>
								$('.custom-file-input').on('change',function(){
								  var fileName = $(this).val().split('\\').pop();
								  console.log(fileName);
								  $(this).next('.custom-file-label').addClass("selected").html(fileName);
								})
							<?php echo '</script'; ?>
>
							
							
							<div class="col-12 col-sm-4 p-4 pt-5">
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="visible" <?php if ($_smarty_tpl->tpl_vars['slide']->value->visible) {?>checked<?php }?>>
										<span class="checkbox-icon fuse-ripple-ready text-blue"></span>
										<span class="form-check-description">Активен</span>
									</label>
								</div>
							</div>
						</div>
							
						
						<div class="divider"></div>
						
						<div class="widget-footer row p-4">
							<div class="col-md-12 text-right">
								<button class="btn btn-success btn-sm text-white fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
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
