<?php
/* Smarty version 3.1.32, created on 2020-03-08 21:23:39
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/languages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e65463b9da1f9_68790908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5a00c40cf60e852ffb291a08a2b0ac3a091acd7' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/languages.tpl',
      1 => 1583695417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e65463b9da1f9_68790908 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('sm_groupe', 'settings' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'languages' ,false ,8);
$_smarty_tpl->_assignInScope('sm_sub_item', 'languages' ,false ,8);
$_smarty_tpl->_assignInScope('meta_title', "Языки" ,false ,8);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'js', null, null);?>

<?php echo '<script'; ?>
>
	var languages_list = document.getElementById('languages_list');
	var sortable = new Sortable(languages_list, {
		multiDrag: true,
		selectedClass: 'bg-yellow-100',
		handle: '.handle',
		animation: 150,
		ghostClass: 'bg-blue-100',
		onEnd: function() {
			$.ajax({url: document.location.href, type: "POST", dataType: "html", data: $('form').serialize()});
		}
	});

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
				data: {'object': 'languages', 'id': id, 'values': {'visible': state}, 'session_id': session_id},
				success: function(data){
					if(!state){
						but.removeClass('text-yellow-900 enbl');
						if(tag)
							tag.show();
					}else{
						but.addClass('text-yellow-900 enbl');
						if(tag)
							tag.hide();
					}			
				},
				dataType: 'json'
			});	
			return false;
		});
		
		$("label.main-lang").on('click', function(){
			var input       = $(this);
			var list        = input.closest("#list");
			var line        = input.closest("#list .todo-item");
			var tag        	= line.find(".main-lang-tag");
			var but         = input.children("input");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var session_id  = input.closest('form').find('input[type="hidden"][name*="session_id"]').val();
			var state       = but.prop('checked')?0:1;
							
			isConfirmed = confirm('Вы точно хотите сменить основной язык?')
				
			if(isConfirmed){
				$.ajax({
					type: 'POST',
					url: 'ajax/update_object.php',
					data: {'object': 'languages_switch_main', 'id': id, 'values': {'main': state}, 'session_id': session_id},
					success: function(data){
						but.prop('checked', true);
						$('.main-lang-tag').hide();
						tag.show();
						
						list.find('.delete').show();
						line.find('.delete').hide();
					},
					dataType: 'json'
				});
			};
			return false;
		});
		
		$("button.delete").on("click", function(){
			var input       = $(this);
			var line        = input.closest("#list .todo-item");
			var id          = line.find('input[type="checkbox"][name*="check"]').val();
			var name          = line.find('a.lang-name').html();
			var session_id  = input.closest('form').find('input[type="hidden"][name*="session_id"]').val();
							
			isConfirmed = confirm('Вы собираетесь полностью удалить "'+name+'" язык. Это также приведет к удалению всех переводов, связанных с этим языком. Вы точно хотите это сделать?')
				
			if(isConfirmed){
				$.ajax({
					type: 'POST',
					url: 'ajax/update_object.php',
					data: {'object': 'languages_delete', 'id': id, 'session_id': session_id},
					success: function(data){
						line.hide();
					},
					dataType: 'json'
				});
			};
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
						<i class="icon-translate s-6"></i>
					</span>
					<span class="logo-text h4">Языки</span>
				</div>
			</div>
		</div>
		
		<div class="col-auto">
			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'LanguageAdmin','id'=>null),$_smarty_tpl ) );?>
" class="btn btn-light fuse-ripple-ready"><i class="icon-plus mr-0 mr-md-2"></i><span class="m-none"> Добавить язык</span></a>
		</div>
	</div>
	<!-- / HEADER -->
	
	<div class="page-content">
		<ul class="nav nav-tabs blue-tabs">
			
			<li class="nav-item">
				<a class='nav-link btn <?php if ($_smarty_tpl->tpl_vars['sm_sub_item']->value == "languages") {?>active<?php }?>' href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'LanguagesAdmin','id'=>null),$_smarty_tpl ) );?>
" >Список языков</a>
			</li>
			
			<li class="nav-item">
				<a class='nav-link btn <?php if ($_smarty_tpl->tpl_vars['sm_sub_item']->value == "lang_constants") {?>active<?php }?>' href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'LangConstantsAdmin','menu_id'=>$_smarty_tpl->tpl_vars['m']->value->id),$_smarty_tpl ) );?>
" >Языковые константы</a>
			</li>

		</ul>
	</div>
	
	<div class="page-content-wrapper">

		<div class="page-content p-4 p-sm-6">
		
		<form method="post">
		<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">		
			<div id="todo" class="card">
				
				<div id="list" class="todo-items w-100">
					<div class="todo-item pr-2 pl-11 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center justify-content-sbetween ">

						<label id="check_all" class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" />
							<span class="custom-control-indicator"></span>
						</label>

						<div class="info col col-sm-4 px-4">
							<div class="title">
								Название языка
							</div>
						</div>
						<div class="info col-sm-2 px-4 m-none">
							<div class="title">
								Код ISO
							</div>
						</div>
						<div class="info col-sm-2 px-4 m-none">
							<div class="title">
								Связанная валюта
							</div>
						</div>
						<div class="info col-sm-2 px-4 m-none">
							<div class="title">
								Основной язык
							</div>
						</div>
						<div class="info pl-8 m-none">
							<div class="title">
								Действия
							</div>
						</div>
					</div>
					<div id="languages_list">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'l');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
?>
						<div class="todo-item sort-item pr-2 py-4 row no-gutters flex-wrap flex-sm-nowrap align-items-center">
							
							<div class="handle mr-1 px-2">
								<i class="icon icon-drag"></i>
							</div>
							<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['l']->value->position;?>
">

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
"/>
								<span class="custom-control-indicator"></span>
							</label>

							<div class="info col-5 col-md-4 px-4 d-flex align-items-start align-sm-items-center justify-content-left flex-column flex-sm-row">

								<div class="title mr-4">
									<a class="td-wh-none lang-name" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'LanguageAdmin','id'=>$_smarty_tpl->tpl_vars['l']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
								</div>

								<div class="tags m-none">
									<div class="tag badge main-lang-tag" <?php if (!$_smarty_tpl->tpl_vars['l']->value->main) {?>style="display:none;"<?php }?>>
										<div class="row no-gutters align-items-center">
											<div class="tag-color mr-2 bg-blue"></div>
											<div class="tag-label">Основной язык</div>
										</div>
									</div>
								</div>
							</div>
							<div class="info col-4 col-sm-2 px-4 d-flex align-items-center justify-content-left m-none">
								<div class="title mr-4">
									<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->code, ENT_QUOTES, 'UTF-8', true);?>

								</div>
							</div>
							<div class="info col-4 col-sm-2 px-4 d-flex align-items-center justify-content-left m-none">
								<div class="title mr-4">
									<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->currency_id, ENT_QUOTES, 'UTF-8', true);?>

								</div>
							</div>
							<div class="info col-1 col-sm-2 px-4 d-flex align-items-center justify-content-left text-blue">
								<label class="form-check-label main-lang">
									<input type="radio" class="form-check-input" name="main" value="<?php echo $_smarty_tpl->tpl_vars['l']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['l']->value->main) {?>checked<?php }?> />
									<span class="radio-icon fuse-ripple-ready"></span>
								</label>
							</div>

							<div class="buttons col-3 col-sm-auto d-flex align-items-center justify-content-start">

								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'LanguageAdmin','id'=>$_smarty_tpl->tpl_vars['l']->value->id),$_smarty_tpl ) );?>
" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
									<i class="icon icon-pencil text-blue"></i>
								</a>
								
								<button type="button" class="btn btn-icon visible" data-toggle="tooltip" data-placement="bottom" title="Вкл\Выкл язык">
									<i class="icon icon-lightbulb <?php if ($_smarty_tpl->tpl_vars['l']->value->visible) {?>text-yellow-900 enbl<?php }?>"></i>
								</button>
								
								<button type="button" class="btn btn-icon delete" <?php if ($_smarty_tpl->tpl_vars['l']->value->main) {?>style="display:none;"<?php }?> data-toggle="tooltip" data-placement="bottom" title="Удалить">
									<i class="icon icon-trash text-red"></i>
								</button>

							</div>
						</div>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
				</div>
				
				 <div class="card-footer py-6">
					 <div class="row">
						<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 m-xs-3">
							<select id="action" class="form-control" name="action">
								<option value="">Выберите действие</option>
								<option value="enable">Отобразить на сайте</option>
								<option value="disable">Отключить на сайте</option>
							</select>
						</div>
						  
						<div class="col-md-2 col-sm-6 col-xs-6">
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
