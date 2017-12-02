<?php /* Smarty version Smarty-3.1.18, created on 2017-06-26 01:12:18
         compiled from "/home/astyle/a-style.kh.ua/dev/templates/default/html/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1858995858595035421cdb95-40370639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67b5062c2c14ca320e6ee87360a8528ae4b6489b' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev/templates/default/html/main.tpl',
      1 => 1498427820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1858995858595035421cdb95-40370639',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_595035422074d7_79780440',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595035422074d7_79780440')) {function content_595035422074d7_79780440($_smarty_tpl) {?>





<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable('', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<?php $_smarty_tpl->tpl_vars['wrapper'] = new Smarty_variable('index.tpl', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['wrapper'] = clone $_smarty_tpl->tpl_vars['wrapper'];?>

<div class="main-boxes">
	<div class="col-md-4">
		<div class="b-holder">
			<a href="/uslugi"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/mp1.jpg" alt="" title=""></a>
			<a href="/uslugi" class="mbox-title">Услуги</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="b-holder">
			<a href="/podarki-i-suveniry"><img src="templates/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/img/mp2.jpg" alt="" title=""></a>
			<a href="/podarki-i-suveniry" class="mbox-title">Подарки и сувениры</a>
		</div>
	</div>
	<div class="clear"></div>
</div><?php }} ?>
