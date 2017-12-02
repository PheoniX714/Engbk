<?php /* Smarty version Smarty-3.1.18, created on 2017-11-14 15:24:05
         compiled from "engine/templates/html/news/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13451790715a07219d9d26c1-42077996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b4d5701b124fb72f54d12054c1b2d75c991e9fc' => 
    array (
      0 => 'engine/templates/html/news/post.tpl',
      1 => 1510665844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13451790715a07219d9d26c1-42077996',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a07219daa2cd5_20200526',
  'variables' => 
  array (
    'post' => 0,
    'message_success' => 0,
    'message_error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a07219daa2cd5_20200526')) {function content_5a07219daa2cd5_20200526($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['sm_groupe'] = new Smarty_variable('news', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_groupe'] = clone $_smarty_tpl->tpl_vars['sm_groupe'];?>
<?php $_smarty_tpl->tpl_vars['sm_item'] = new Smarty_variable('news', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['sm_item'] = clone $_smarty_tpl->tpl_vars['sm_item'];?>
<?php if ($_smarty_tpl->tpl_vars['post']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['post']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новая страница', null, 1);
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
	<script src="./templates/js/autotags_post.js"></script>
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
	<h1><?php if ($_smarty_tpl->tpl_vars['post']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['post']->value->name;?>
<?php } else { ?>Новая новость<?php }?> <small><?php if ($_smarty_tpl->tpl_vars['post']->value->id) {?>Редактирование<?php } else { ?>Создание<?php }?> новости</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'NewsAdmin'),$_smarty_tpl);?>
">Новости</a></li>
		<li class="active"><?php if ($_smarty_tpl->tpl_vars['post']->value->id) {?><?php echo $_smarty_tpl->tpl_vars['post']->value->name;?>
<?php } else { ?>Новая новость<?php }?></li>
	</ol>
</section>


<?php echo $_smarty_tpl->getSubTemplate ('editor/tinymce_init.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<section class="content">
	<div class="row">
		<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Новость добавлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Новость обновлена<?php }?></h4>
			</div>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Новость с таким адресом уже существует<?php }?></h4>
			</div>
		</div>
		<?php }?>
		
		<!-- Основная форма -->
		<form method=post>
		<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-file-text"></i>
				  <h3 class="box-title" style="line-height:1.5">Основные настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'PostAdmin','id'=>null),$_smarty_tpl);?>
" class="btn btn-primary btn-sm pull-right btn-flat mr10"><i class="fa fa-plus"></i> Добавить новую новость</a> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-md-4">
						<label for="header">Название новости</label>
						<input type="text" id="name" class="form-control" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
						<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
					</div>
					<div class="form-group col-md-4">
						<div class="checkbox" style="margin-top:30px;">
							<label>
								<input type="checkbox" name="visible" class="minimal" <?php if ($_smarty_tpl->tpl_vars['post']->value->visible) {?>checked<?php }?>>
								Активна
							</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="form-group col-md-3">
						<label for="date">Дата</label>
						<div id="date" class="input-group date" data-auto-close="true" data-date="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
" data-date-format="dd.mm.yyyy" data-date-autoclose="true">
							<input id="date" class="form-control" name="date" type="text" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>
">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="post_image">Изображение новости</label>
						
						<div class="input-group">
							<input type="text" id="post_image" class="form-control" name="image" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->image, ENT_QUOTES, 'UTF-8', true);?>
">
							<span class="input-group-btn">
								<a href="./templates/js/filemanager/dialog.php?type=1&relative_url=1&field_id=post_image" type="button" class="btn btn-primary btn-flat iframe-btn">Выбрать</a>
							</span>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-search-plus"></i>
				  <h3 class="box-title" style="line-height:1.5">SEO настройки</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-sm-4">
						<label for="url">Адрес</label>
						<div> <span style="width:20%; line-height: 34px; float: left;">/news/</span><input type="text" id="url" style="width:80%;" class="form-control adress-input" name="url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" /></div>
					</div>
					<div class="form-group col-sm-4">
						<label for="meta_title">Заголовок</label>
						<input type="text" id="meta_title" class="form-control" name="meta_title" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->meta_title, ENT_QUOTES, 'UTF-8', true);?>
">
					</div>
					<div class="form-group col-sm-4">
						<label for="meta_keywords">Ключевые слова</label>
						<input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->meta_keywords, ENT_QUOTES, 'UTF-8', true);?>
">
					</div>
					<div class="form-group col-sm-8">
						<label for="meta_description">Описание</label>
						<textarea data-required="true" data-minlength="5" name="meta_description" id="meta_description" cols="10" rows="3" class="form-control"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->meta_description, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
					</div>
					<div class="clear"></div>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-font"></i>
				  <h3 class="box-title" style="line-height:1.5">Аннотация</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<textarea name="annotation" rows="10" class="form-control editor_small"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->annotation, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
				</div>
				<!-- /.box-body -->
			</div>
			
			<div class="box box-primary"> 
				<div class="box-header with-border">
				  <i class="fa fa-font"></i>
				  <h3 class="box-title" style="line-height:1.5">Полный текст</h3>
				  <input class="btn btn-success btn-sm pull-right btn-flat" type="submit" name="" value="Сохранить">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<textarea name="body" rows="30" class="form-control editor_large"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->text, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		</form>
	</div>
</section>
<?php }} ?>
