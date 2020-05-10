<?php
/* Smarty version 3.1.32, created on 2020-03-05 20:34:26
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/news/news-categories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e6146325b1de4_19325308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab51f052cdc8b5d139f2b8e9f98c818ad0f423e3' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/news/news-categories.tpl',
      1 => 1583430454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6146325b1de4_19325308 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'categories_tree' => 
  array (
    'compiled_filepath' => '/home/astyle/a-style.kh.ua/dev2/engine/templates/compiled/ab51f052cdc8b5d139f2b8e9f98c818ad0f423e3_0.file.news-categories.tpl.php',
    'uid' => 'ab51f052cdc8b5d139f2b8e9f98c818ad0f423e3',
    'call_name' => 'smarty_template_function_categories_tree_16756600965e61463256c8e4_91351969',
  ),
));
$_smarty_tpl->_assignInScope('meta_title', 'Категории новостей' ,false ,8);
$_smarty_tpl->_assignInScope('sm_groupe', 'news' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'news_categories' ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
	$(function () {

		if( window.screen.width >= 1024 ){
			$(".todo-items").sortable({
				items:".sort-item",
				handle: ".handle",
				tolerance:"pointer",
				scrollSensitivity:40,
				opacity:0.7, 
				axis: "y",
				update: function(event, ui){$(this).closest("form").submit();}
			});
		}
	
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
				data: {'object': 'news_categories', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
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
						<i class="icon-format-list-bulleted s-6"></i>
					</span>
					<span class="logo-text h4">Категории новостей</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'NewsCategoryAdmin','id'=>null),$_smarty_tpl ) );?>
" class="btn btn-light fuse-ripple-ready"><i class="icon-file-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить категорию</span></a>
		</div>
	</div>

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
				
					
				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'categories_tree', array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>0), true);?>


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
/* smarty_template_function_categories_tree_16756600965e61463256c8e4_91351969 */
if (!function_exists('smarty_template_function_categories_tree_16756600965e61463256c8e4_91351969')) {
function smarty_template_function_categories_tree_16756600965e61463256c8e4_91351969(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

				<div id="list" class="todo-items w-100">
					<?php if ($_smarty_tpl->tpl_vars['level']->value == 0) {?>
					<div class="todo-item pr-4 pl-4 pl-sm-11 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col px-4">

							<div class="title d-flex justify-content-between align-items-center">
								Название категории
								
								<button class="btn btn-icon pull-right" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters"><i class="icon-settings" data-toggle="tooltip" data-placement="bottom" title="Открыть/Закрыть фильтры"></i></button>
							</div>
						</div>
					</div>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
					<div class="sort-item">
						<div class="todo-item pl-<?php echo $_smarty_tpl->tpl_vars['level']->value*7+4;?>
 pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">

							<div class="handle mr-1 px-2 m-none">
								<i class="icon icon-drag-vertical"></i>
							</div>
							<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->position;?>
">

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
" />
								<span class="custom-control-indicator"></span>
							</label>

							<div class="info col px-4 d-flex align-items-start align-sm-items-center justify-content-left flex-column flex-sm-row">

								<div class="title mr-4">
									<a class="td-wh-none <?php if (!$_smarty_tpl->tpl_vars['category']->value->name) {?>text-red<?php }?>" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'NewsCategoryAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id,'language_id'=>$_smarty_tpl->tpl_vars['filter_language']->value,'return'=>null),$_smarty_tpl ) );?>
"><?php if (!$_smarty_tpl->tpl_vars['category']->value->name) {?>Отсутствует перевод<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);
}?></a>
								</div>

								<div class="tags">
									<div class="tag badge visible-tag" <?php if ($_smarty_tpl->tpl_vars['category']->value->visible) {?>style="display:none;"<?php }?>>
										<div class="row no-gutters align-items-center">
											<div class="tag-color mr-2 bg-red"></div>
											<div class="tag-label">Отключена</div>
										</div>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['category']->value->need_translate && count($_smarty_tpl->tpl_vars['category']->value->need_translate) > 0) {?>
									<div class="tag badge language-tag">
										<div class="row no-gutters align-items-center">
											<div class="tag-color mr-2 bg-red"></div>
											<div class="tag-label">Отсутствуют переводы: <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value->need_translate, 'nt');
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

							<div class="buttons col-12 col-sm-auto d-flex align-items-center justify-content-end">

								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'NewsCategoryAdmin','id'=>$_smarty_tpl->tpl_vars['category']->value->id,'language_id'=>$_smarty_tpl->tpl_vars['filter_language']->value,'return'=>null),$_smarty_tpl ) );?>
" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
									<i class="icon icon-pencil text-blue"></i>
								</a>
								
								<button type="button" class="btn btn-icon visible" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл категорию">
									<i class="icon icon-lightbulb <?php if ($_smarty_tpl->tpl_vars['category']->value->visible) {?>text-yellow-900 enbl<?php }?>"></i>
								</button>
								
								<a href="../news/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
" class="btn btn-icon" target="__blank" data-toggle="tooltip" data-placement="bottom" title="Открыть в новом окне">
									<i class="icon icon-open-in-new text-blue"></i>
								</a>
								
								<button type="button" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Удалить">
									<i class="icon icon-trash text-red"></i>
								</button>
								
							</div>
						</div>
						<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'categories_tree', array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), true);?>

					</div>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>
				</div>
				<?php
}}
/*/ smarty_template_function_categories_tree_16756600965e61463256c8e4_91351969 */
}
