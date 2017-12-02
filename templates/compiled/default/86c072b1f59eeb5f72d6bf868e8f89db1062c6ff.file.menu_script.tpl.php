<?php /* Smarty version Smarty-3.1.18, created on 2017-11-19 14:59:17
         compiled from "/home/astyle/mdk.ua/www/templates/default/html/menu_script.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18635496125a0ff976c47245-68620746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86c072b1f59eeb5f72d6bf868e8f89db1062c6ff' => 
    array (
      0 => '/home/astyle/mdk.ua/www/templates/default/html/menu_script.tpl',
      1 => 1511096356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18635496125a0ff976c47245-68620746',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0ff976c77047_10500178',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0ff976c77047_10500178')) {function content_5a0ff976c77047_10500178($_smarty_tpl) {?>
<script>
	
	$(function() {
		$(".product .product-color").hover(
			function() {
				var p_id = $(this).children("a").attr("data-pId");
				var image_id = $(this).children("a").attr("data-imgId");
				$("#product_"+p_id+" .image .p_images").hide();
				$("#product_"+p_id+" .image #image_"+image_id).show();
			},function() {
				var p_id = $(this).children("a").attr("data-pId");
				$("#product_"+p_id+" .image .p_images").hide();
				$("#product_"+p_id+" .image .main_img").show();
			}
		);
	});
	
	
</script>
<?php }} ?>
