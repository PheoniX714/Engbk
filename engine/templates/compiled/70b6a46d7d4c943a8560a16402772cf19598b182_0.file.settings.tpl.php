<?php
/* Smarty version 3.1.32, created on 2020-05-09 21:54:54
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5eb6fc7e070cc1_18654659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70b6a46d7d4c943a8560a16402772cf19598b182' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/settings.tpl',
      1 => 1588598332,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb6fc7e070cc1_18654659 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('meta_title', "Настройки сайта" ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'settings' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'settings' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>    
    (function () {
        "use strict";
        window.addEventListener("load", function () {
            var form = document.getElementById("needs-validation");
            form.addEventListener("submit", function (event) {
                if ( form.checkValidity() == false )
                {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            }, false);
        }, false);
    }());
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="contacts" class="page-layout simple left-sidebar-floating">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-settings s-6"></i>
					</span>
					<span class="logo-text h4">Настройки сайта</span>
				</div>
			</div>
		</div>
	</div>
	
	<form method="post" enctype="multipart/form-data" id="needs-validation" novalidate>
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
	
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
						  text: "<?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'saved') {?>Настройки успешно сохранены<?php }?>"
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
}?>"
						});
					});   
				<?php echo '</script'; ?>
> 
				<?php }?>
				
				<div class="row">
					<div class="col-12 col-md-4 mb-5">
						<div class="card mb-3">
							<div class="card-header">
								<b>Оповещения с сайта</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="order_email" name="order_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->order_email, ENT_QUOTES, 'UTF-8', true);?>
" required>
											<label for="order_email">Оповещение о заказах</label>
											<div class="invalid-feedback">
												Введите email!
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="comment_email" name="comment_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->comment_email, ENT_QUOTES, 'UTF-8', true);?>
" required>
											<label for="comment_email">Оповещение о комментариях</label>
											<div class="invalid-feedback">
												Введите email!
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="notify_from_email" name="notify_from_email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->notify_from_email, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="32" required>
											<label for="notify_from_email">Обратный адрес оповещений</label>
											<div class="invalid-feedback">
												Введите email!
											</div>
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
								<b>Основные настройки</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="site_name" name="site_name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="site_name">Название сайта</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="date_format" name="date_format" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->date_format, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="date_format">Формат даты</label>
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
								<b>Базовые настройки превью страницы</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="page_preview_width" name="page_preview_width" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->page_preview_width, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="page_preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="page_preview_height" name="page_preview_height" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->page_preview_height, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="page_preview_height">Макс. высота, px</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card mb-3">
							<div class="card-header">
								<b>Базовые настройки дополнительных изображений страницы</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="page_images_width" name="page_images_width" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->page_images_width, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="page_images_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="page_images_height" name="page_images_height" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->page_images_height, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="page_images_height">Макс. высота, px</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					
						<div class="card mb-3">
							<div class="card-header">
								<b>Базовые настройки превью новости</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="post_preview_width" name="post_preview_width" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->post_preview_width, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="post_preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="post_preview_height" name="post_preview_height" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->post_preview_height, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="post_preview_height">Макс. высота, px</label>
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
						
						<div class="card mb-3">
							<div class="card-header">
								<b>Базовые настройки превью категории</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="category_preview_width" name="category_preview_width" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->category_preview_width, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="category_preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="category_preview_height" name="category_preview_height" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->category_preview_height, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="category_preview_height">Макс. высота, px</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card mb-3">
							<div class="card-header">
								<b>Базовые настройки превью бренда</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="brand_preview_width" name="brand_preview_width" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->brand_preview_width, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="brand_preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="brand_preview_height" name="brand_preview_height" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->brand_preview_height, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="brand_preview_height">Макс. высота, px</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card mb-3">
							<div class="card-header">
								<b>Максимальные размеры фото товара</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="product_images_width" name="product_images_width" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->product_images_width, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="product_images_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="product_images_height" name="product_images_height" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->product_images_height, ENT_QUOTES, 'UTF-8', true);?>
">
											<label for="product_images_height">Макс. высота, px</label>
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
}
