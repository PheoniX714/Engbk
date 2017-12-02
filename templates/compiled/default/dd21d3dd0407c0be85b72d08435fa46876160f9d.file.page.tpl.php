<?php /* Smarty version Smarty-3.1.18, created on 2017-06-26 02:01:17
         compiled from "/home/astyle/a-style.kh.ua/dev/templates/default/html/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2110183574594fa5275ae761-14442826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd21d3dd0407c0be85b72d08435fa46876160f9d' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev/templates/default/html/page.tpl',
      1 => 1498431666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2110183574594fa5275ae761-14442826',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_594fa5277f3f56_96447245',
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594fa5277f3f56_96447245')) {function content_594fa5277f3f56_96447245($_smarty_tpl) {?><div id="page_title"><p><a href="./">Главная</a></p><h1 data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
<div id="category_description">
<?php if ($_smarty_tpl->tpl_vars['page']->value->body) {?><?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

<?php } else { ?><h4 style='padding:50px 0;'>Страница на стадии оформления<br />Попробуйте зайти позже</h4><?php }?>
</div><?php }} ?>
