<?php /* Smarty version Smarty-3.1.18, created on 2017-11-28 17:26:43
         compiled from "engine/templates/html/slider/slide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20335749135a143a44310238-46449447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0f24fa0387d53950a05c3735b78253de20cf739' => 
    array (
      0 => 'engine/templates/html/slider/slide.tpl',
      1 => 1511882775,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20335749135a143a44310238-46449447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a143a44372487_81539172',
  'variables' => 
  array (
    'slide' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'config' => 0,
    'languages' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a143a44372487_81539172')) {function content_5a143a44372487_81539172($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('slider', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php if ($_smarty_tpl->tpl_vars['slide']->value->filename) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Редактирование слайда', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Добавление слайда', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>

<?php $_smarty_tpl->tpl_vars['page_additional_css'] = new Smarty_variable('
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
	<link rel="stylesheet" href="./templates/js/fancybox/jquery.fancybox.min.css">
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_css'] = clone $_smarty_tpl->tpl_vars['page_additional_css'];?>
<?php $_smarty_tpl->tpl_vars['page_additional_js'] = new Smarty_variable('
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/fancybox/jquery.fancybox.min.js"></script>
	<script src="./templates/js/content.js"></script>
	<script>
		 $(".iframe-btn").fancybox({	
			"width"		: 900,
			"height"	: 600,
			"type"		: "iframe",
				"autoScale"    	: false
			});
	</script>
', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['page_additional_js'] = clone $_smarty_tpl->tpl_vars['page_additional_js'];?>

<section class="content-header">
	<h1><?php if ($_smarty_tpl->tpl_vars['slide']->value->filename) {?>Редактирование слайда<?php } else { ?>Добавление слайда<?php }?></h1>
	<ol class="breadcrumb">
		<li><a href="index.php">Главная</a></li>
		<li><a href="index.php?module=SliderAdmin">Слайдер</a></li>
		<li class="active"><?php if ($_smarty_tpl->tpl_vars['slide']->value->filename) {?>Редактирование слайда<?php } else { ?>Добавление слайда<?php }?></li>
	</ol>
</section>

<section class="content">
	<div class="row">		
		<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Слайд добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Слайд обновлен<?php }?></h4>
			</div>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='watermark_is_not_writable') {?>Установите права на запись для файла <?php echo $_smarty_tpl->tpl_vars['config']->value->watermark_file;?>
<?php }?></h4>
			</div>
		</div>
		<?php }?>
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
		<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'SlideAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить еще слайд</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-md-4">
						<label>Превью слайда</label>
						<div class="slider-img">
							<img src="/files/uploads/<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->filename, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
" style="width:100%;height:auto;">
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="post_image">Изображение слайда</label>
						
						<div class="input-group">
							<input type="text" id="post_image" class="form-control" name="filename" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->filename, ENT_QUOTES, 'UTF-8', true);?>
">
							<span class="input-group-btn">
								<a href="./templates/js/filemanager/dialog.php?type=1&relative_url=1&field_id=post_image" type="button" class="btn btn-primary btn-flat iframe-btn">Выбрать</a>
							</span>
						</div>
					</div>
					<div class="form-group col-md-4">
						<div class="block">
							<label for="visible" style="line-height:34px;">Активен</label>
							<input name="visible" value='1' type="checkbox" <?php if ($_smarty_tpl->tpl_vars['slide']->value->visible) {?>checked<?php }?> />
						</div>
						<div class="block">
							<h3>Требование к загружаемому изображению:</h3>
							<p>Размер: 1920 х 500 пикселей; формат: "jpg"; Качество 60-70</p>
						</div>
					
						<div class="form-group">
							<label for="link">Ссылка на страницу</label>
							<input type="text" id="link" class="form-control" name="link" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->link, ENT_QUOTES, 'UTF-8', true);?>
" />
						</div>
						<div class="form-group">
							<label for="slider_id">id слайдера</label>
							<input type="text" id="slider_id" class="form-control" name="slider_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value->slider_id, ENT_QUOTES, 'UTF-8', true);?>
" />
						</div>
						<div class="form-group">
							<label for="language_id">Привязка к языку</label>
							<select id="language_id" class="form-control" name="language_id">
								<option value='0'>Для всех языков</option>
								<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
									<option value='<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['slide']->value->language_id==$_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		</form>
	</div>
</section>
<?php }} ?>
