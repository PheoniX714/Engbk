<?php
/* Smarty version 3.1.32, created on 2020-03-08 01:34:13
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/language.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e642f75ddeb86_12869633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e6160ee839a1fae403483b12210847b7d6abffa' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/settings/language.tpl',
      1 => 1538667482,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e642f75ddeb86_12869633 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('sm_groupe', 'settings' ,false ,8);
$_smarty_tpl->_assignInScope('sm_item', 'languages' ,false ,8);
$_smarty_tpl->_assignInScope('sm_sub_item', 'languages' ,false ,8);
if ($_smarty_tpl->tpl_vars['l']->value->id) {
$_smarty_tpl->_assignInScope('meta_title', $_smarty_tpl->tpl_vars['l']->value->name ,false ,8);
} else {
$_smarty_tpl->_assignInScope('meta_title', 'Новый язык' ,false ,8);
}?>

<div id="contacts" class="page-layout simple left-sidebar-floating tabbed">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-translate s-6"></i>
					</span>
					<span class="logo-text h4"><?php if ($_smarty_tpl->tpl_vars['l']->value->id) {
echo $_smarty_tpl->tpl_vars['l']->value->name;
} else { ?>Новый язык<?php }?></span>
				</div>
			</div>
		</div>
	</div>
	
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
	
	<form method="post">
	<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/>
		
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group row no-gutters">
				
				<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
				<div class="col-md-12 p-3 animated fadeIn">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<h4><i class="icon icon-check"></i> <?php if ($_smarty_tpl->tpl_vars['message_success']->value == 'added') {?>Язык добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value == 'updated') {?>Язык обновлен<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['message_success']->value, ENT_QUOTES, 'UTF-8', true);
}?></h4>
					</div>
				</div>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
				<div class="col-md-12 p-3 animated fadeIn">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<h4><i class="icon fa fa-ban"></i> <?php if ($_smarty_tpl->tpl_vars['message_error']->value == 'empty_name') {?>Введите название языка<?php } elseif ($_smarty_tpl->tpl_vars['message_error']->value == 'empty_code') {?>Введите ISO код языка<?php } else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['message_error']->value, ENT_QUOTES, 'UTF-8', true);
}?></h4>
					</div>
				</div>
				<?php }?>
				
				<div class="col-md-12 col-xs-12 p-3 animated fadeInLeft">

					<div class="card mb-3">
						
						<div class="widget-content row px-4 pt-6">
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->name, ENT_QUOTES, 'UTF-8', true);?>
">
									<label for="name">Название </label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="visible_name" name="visible_name" aria-describedby="headerHelp" placeholder="Введите название на сайте" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->visible_name, ENT_QUOTES, 'UTF-8', true);?>
">
									<label for="visible_name">Название на сайте</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input type="text" class="form-control" id="code" name="code" aria-describedby="headerHelp" placeholder="Введите ISO код" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value->code, ENT_QUOTES, 'UTF-8', true);?>
">
									<label for="code">Код ISO (2 символа)</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group pt-0">
									<label for="currency_id" class="col-form-label pb-0">Связанная валюта</label>
									<select class="form-control" id="currency_id" name="currency_id">
										<option value="0">По умолчанию</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
										<option <?php if ($_smarty_tpl->tpl_vars['l']->value->currency_id == $_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</select>									
								</div>
							</div>
							
						</div>
						
						<div class="divider"></div>
						
						<div class="widget-footer row px-4 py-6">
							<div class="col-md-12 text-right">
								<button class="btn btn-success btn-sm fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
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
