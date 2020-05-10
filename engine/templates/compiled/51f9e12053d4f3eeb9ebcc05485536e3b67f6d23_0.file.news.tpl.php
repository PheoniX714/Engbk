<?php
/* Smarty version 3.1.32, created on 2020-03-05 20:09:15
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/news/news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e61404b287471_28797483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51f9e12053d4f3eeb9ebcc05485536e3b67f6d23' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/news/news.tpl',
      1 => 1583431752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e61404b287471_28797483 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/astyle/a-style.kh.ua/dev2/Smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_assignInScope('meta_title', 'Новости' ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'news' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'news' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
	$(function () {

		$("#check_all").change(function() {
			if($('#check_all').hasClass('checked')){
				$('#list .custom-control-input:not(:disabled)').attr('checked', false);
				$('#check_all').removeClass('checked');
			}else{
				$('#list .custom-control-input:not(:disabled)').attr('checked', true);
				$('#check_all').addClass('checked');
			}
		});		
		  
		$("button.visible").on('click', function(){
			var icon        = $(this);
			var line        = icon.closest("#list .todo-item");
			var tag        	= line.find(".visible-tag");
			var but         = icon.children(".icon-lightbulb");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = icon.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.hasClass('enbl')?0:1;
			$.ajax({
				type: 'POST',
				url: 'ajax/update_object.php',
				data: {'object': 'news', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
				success: function(data){
					if(!state){
						but.removeClass('text-yellow-900 enbl');
						tag.show();
					}else{
						but.addClass('text-yellow-900 enbl');
						tag.hide();
					}			
				},
				dataType: 'json'
			});	
			return false;
		});
		
		$("button.delete").on("click", function(){
			$('#list .todo-item input[type="checkbox"][name*="check"]').prop('checked', false);
			$(this).closest("#list .todo-item").find('input[type="checkbox"][name*="check"]').prop('checked', true);
			$(this).closest("form").find('select[name="action"] option[value=delete]').prop('selected', true);
			$(this).closest("form").submit();
			return false;
		});
		
		$("form").submit(function() {
			if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
				return false;	
		});
		
	  });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<div id="contacts" class="page-layout simple left-sidebar-floating tabbed">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">

		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-file-multiple s-6"></i>
					</span>
					<span class="logo-text h4">Новости</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'PostAdmin','id'=>null),$_smarty_tpl ) );?>
" class="btn btn-light fuse-ripple-ready"><i class="icon-file-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить новость</span></a>
		</div>
	</div>
	<!-- / HEADER -->

	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="post">
			<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">	
			<div class="collapse <?php if ($_smarty_tpl->tpl_vars['main_language']->value->id != $_smarty_tpl->tpl_vars['filter_language']->value) {?>show<?php }?>" id="filters">
				<div class="card mb-3">
					<div class="card-body d-flex align-items-end flex-wrap">
						<div class="form-group pt-0 mb-2 col-12 col-sm-4 col-md-2">
							<label for="filter_language">Язык перевода</label>
							<select class="form-control" id="filter_language" name="filter_language">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['filter_language']->value == $_smarty_tpl->tpl_vars['l']->value->id) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>	
							</select>
						</div>
						
						<div class="col">
							<button class="btn btn-primary btn-sm" type="submit">Фильтровать</button>
						</div>
					</div>
				</div>
			</div>
	
			<div id="todo" class="card">
				
				<div id="list" class="todo-items w-100">
					<div class="todo-item p-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4 d-flex align-items-center justify-content-between">
							<b>Название</b>
													
							<button class="btn btn-icon pull-right" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters"><i class="icon-settings" data-toggle="tooltip" data-placement="bottom" title="Открыть/Закрыть фильтры"></i></button>
						</div>

					</div>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
					<div class="todo-item p-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

						<label class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
"/>
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-left flex-column flex-sm-row">
							<div class="title mr-4">
								<a class="td-wh-none" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'PostAdmin','id'=>$_smarty_tpl->tpl_vars['p']->value->id,'lang_group'=>null,'language_id'=>$_smarty_tpl->tpl_vars['filter_language']->value,'lang_id'=>null,'return'=>null),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
							</div>
							
							<div class="tags">
								<div class="tag badge visible-tag" <?php if ($_smarty_tpl->tpl_vars['p']->value->visible) {?>style="display:none;"<?php }?>>
									<div class="row no-gutters align-items-center">
										<div class="tag-color mr-2 bg-red"></div>
										<div class="tag-label">Отключена</div>
									</div>
								</div>
								<?php if ($_smarty_tpl->tpl_vars['p']->value->need_translate && count($_smarty_tpl->tpl_vars['p']->value->need_translate) > 0) {?>
								<div class="tag badge language-tag">
									<div class="row no-gutters align-items-center">
										<div class="tag-color mr-2 bg-red"></div>
										<div class="tag-label">Отсутствуют переводы: <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['p']->value->need_translate, 'nt');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['nt']->value) {
?><b><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['nt']->value, 'UTF-8');?>
</b> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div>
									</div>
								</div>
								<?php }?>
							</div>
						</div>
						<div class="info col-12 col-md-2 px-4 my-2 my-md-0 pl-11 pl-md-4 d-flex align-items-center justify-content-left">
							<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value->date,"%d.%m.%Y");?>

						</div>

						<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'PostAdmin','id'=>$_smarty_tpl->tpl_vars['p']->value->id,'lang_group'=>null,'language_id'=>$_smarty_tpl->tpl_vars['filter_language']->value,'lang_id'=>null,'return'=>null),$_smarty_tpl ) );?>
" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
								<i class="icon icon-pencil text-blue"></i>
							</a>
							
							<button type="button" class="btn btn-icon visible" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл страницу">
								<i class="icon icon-lightbulb <?php if ($_smarty_tpl->tpl_vars['p']->value->visible) {?>text-yellow-900 enbl<?php }?>"></i>
							</button>
							
							<a href="../post/<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
" class="btn btn-icon" target="__blank" data-toggle="tooltip" data-placement="bottom" title="Открыть в новом окне">
								<i class="icon icon-open-in-new text-blue"></i>
							</a>

							<button type="button" class="btn btn-icon delete" data-toggle="tooltip" data-placement="bottom" title="Удалить">
								<i class="icon icon-trash text-red"></i>
							</button>

						</div>
					</div>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
				
				 <div class="card-footer py-6">
					<div class="row">
						<div class="col-12 col-sm-4 col-md-3 mb-3 mb-sm-0">
							<select id="action" class="form-control" name="action">
								<option value="">Выберите действие</option>
								<option value="enable">Отобразить на сайте</option>
								<option value="disable">Отключить на сайте</option>
								<option value="delete">Удалить</option>
							</select>
						</div>
						  
						<div class="col-12 col-md-2 col-sm-6 col-xs-6">
							<button type="submit" class="btn btn-secondary btn-sm fuse-ripple-ready" value="Применить">Применить</button>
						</div>
					</div>
				 </div>
			</div>
		</form>
		</div>
	</div>
</div><?php }
}
