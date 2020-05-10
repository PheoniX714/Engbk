{$meta_title = "Настройки сайта" scope='root'}
{$sm_groupe = 'settings' scope='root'}
{$sm_item = 'settings' scope='root'}

{capture name=js}
{literal}
<script>    
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
</script>
{/literal}
{/capture}

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
	<input type="hidden" name="session_id" value="{$smarty.session.id}">
	
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group no-gutters">
				{if $message_success}
				<script>  
					$(document).ready(function(){  
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.success({
						  title: 'Готово!',
						  text: "{if $message_success == 'saved'}Настройки успешно сохранены{/if}"
						});
					});   
				</script> 
				{/if}
				
				{if $message_error}
				<script>  
					$(document).ready(function(){   
						PNotify.defaults.styling = 'material';
						PNotify.defaults.icons = 'material';
						PNotify.error({
						  title: 'Ой, что то не так...',
						  text: "{if $message_error == 'watermark_is_not_writable'}Установите права на запись для файла {$config->watermark_file}{/if}"
						});
					});   
				</script> 
				{/if}
				
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
											<input type="text" class="form-control" id="order_email" name="order_email" value="{$settings->order_email|escape}" required>
											<label for="order_email">Оповещение о заказах</label>
											<div class="invalid-feedback">
												Введите email!
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="comment_email" name="comment_email" value="{$settings->comment_email|escape}" required>
											<label for="comment_email">Оповещение о комментариях</label>
											<div class="invalid-feedback">
												Введите email!
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="notify_from_email" name="notify_from_email" value="{$settings->notify_from_email|escape}" maxlength="32" required>
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
											<input type="text" class="form-control" id="site_name" name="site_name" value="{$settings->site_name|escape}">
											<label for="site_name">Название сайта</label>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" class="form-control" id="date_format" name="date_format" value="{$settings->date_format|escape}">
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
											<input type="text" class="form-control" id="page_preview_width" name="page_preview_width" value="{$settings->page_preview_width|escape}">
											<label for="page_preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="page_preview_height" name="page_preview_height" value="{$settings->page_preview_height|escape}">
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
											<input type="text" class="form-control" id="page_images_width" name="page_images_width" value="{$settings->page_images_width|escape}">
											<label for="page_images_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="page_images_height" name="page_images_height" value="{$settings->page_images_height|escape}">
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
											<input type="text" class="form-control" id="post_preview_width" name="post_preview_width" value="{$settings->post_preview_width|escape}">
											<label for="post_preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="post_preview_height" name="post_preview_height" value="{$settings->post_preview_height|escape}">
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
											<input type="text" class="form-control" id="category_preview_width" name="category_preview_width" value="{$settings->category_preview_width|escape}">
											<label for="category_preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="category_preview_height" name="category_preview_height" value="{$settings->category_preview_height|escape}">
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
											<input type="text" class="form-control" id="brand_preview_width" name="brand_preview_width" value="{$settings->brand_preview_width|escape}">
											<label for="brand_preview_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="brand_preview_height" name="brand_preview_height" value="{$settings->brand_preview_height|escape}">
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
											<input type="text" class="form-control" id="product_images_width" name="product_images_width" value="{$settings->product_images_width|escape}">
											<label for="product_images_width">Макс. ширина, px</label>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input type="text" class="form-control" id="product_images_height" name="product_images_height" value="{$settings->product_images_height|escape}">
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
</div>