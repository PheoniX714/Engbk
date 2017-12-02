<?php /* Smarty version Smarty-3.1.18, created on 2017-11-14 15:48:02
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/tpl_comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10520894845a0af4120e2819-65234475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cf8096994dc029244ac963c50b61c6688f755e1' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/tpl_comments.tpl',
      1 => 1498431666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10520894845a0af4120e2819-65234475',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name_title' => 0,
    'comments' => 0,
    'comment' => 0,
    'error' => 0,
    'comment_text' => 0,
    'comment_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0af4121371d5_29123825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0af4121371d5_29123825')) {function content_5a0af4121371d5_29123825($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/astyle/mdk.ua/www/Smarty/libs/plugins/function.math.php';
?><div id="comments">
	<div id="page_title"><h1><?php echo $_smarty_tpl->tpl_vars['name_title']->value;?>
</h1></div>
	<?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
		<ul class="comment_list">
		<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
		<a name="comment_<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
"></a>
		<li>
			<div class="comment_header">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <i><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>
, <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>
</i>
			<?php if (!$_smarty_tpl->tpl_vars['comment']->value->approved) {?>ожидает модерации</b><?php }?>
			</div>
			<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->text, ENT_QUOTES, 'UTF-8', true));?>

		</li>
		<?php } ?>
		</ul>
	<?php }?>

	<form class="form" method="post">
		<h2>Написать свой комментарий</h2>
		<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
		<div class="message_error">
			<?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>Неверно введена капча
			<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>Введите имя
			<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_comment') {?>Введите комментарий
			<?php }?>
		</div>
		<?php }?>
		<textarea class="comment_textarea" id="comment_text" name="text" data-format=".+" data-notice="Введите комментарий"><?php echo $_smarty_tpl->tpl_vars['comment_text']->value;?>
</textarea>
		<label for="comment_name">Ваше Имя</label>
		<input class="input_name" type="text" id="comment_name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['comment_name']->value;?>
" data-format=".+" data-notice="Введите имя"/>
		<label for="comment_captcha">Число с картинки</label>
		<div class="captcha"><img src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
" alt='captcha'/></div>
		<input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>
		<input class="button right" type="submit" name="comment" value="Отправить" />
	</form>
</div>

<script>
$(function() {
	// Раскраска строк
	$(".comment_list li:even").addClass('even');
});
</script>
<?php }} ?>
