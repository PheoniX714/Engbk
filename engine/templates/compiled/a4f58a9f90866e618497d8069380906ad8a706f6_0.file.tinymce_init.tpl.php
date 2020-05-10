<?php
/* Smarty version 3.1.32, created on 2020-03-08 13:23:51
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/editor/tinymce_init.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e64d5c75cc600_32986138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4f58a9f90866e618497d8069380906ad8a706f6' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/editor/tinymce_init.tpl',
      1 => 1583666339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e64d5c75cc600_32986138 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 language="javascript" type="text/javascript" src="./templates/js/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript">
tinymce.init({
    selector: "textarea.editor_large,textarea.editor_small",
    language : "ru",
	branding: false,
	content_css : '/engine/templates/css/tinymce.css',
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern responsivefilemanager"
   ],
   toolbar1: "undo redo | table | searchreplace | styleselect formatselect | outdent indent | link unlink responsivefilemanager image media code | template | preview ",
   toolbar2: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor | fontselect fontsizeselect ",
   image_advtab: true ,
   paste_word_valid_elements: "b,strong,i,em,h1,h2",
   paste_as_text: true,
   
   link_class_list: [
		{title: 'Нет', value: ''},
		{title: 'Увеличение изображения', value: 'fancybox'}
   ],
   
   
   plugin_preview_width: 1026,
   fontsize_formats: '8pt 10pt 11pt 12pt 14pt 18pt 24pt 36pt',
   
   external_filemanager_path:"/engine/templates/js/filemanager/",
   filemanager_title:"Менеджер файлов" ,
   external_plugins: { "filemanager" : "../../../../engine/templates/js/filemanager/plugin.min.js"},
		setup : function(ed) {
		if(typeof set_meta == 'function')
		{
			ed.on('keyUp', function() {
    			set_meta();
			});
			ed.on('change', function() {
    			set_meta();
			});
		}
	},
	
	templates: [],
	template_popup_width: 1170
	
	});
	function myCustomGetContent( id ) {
		if( typeof tinymce != "undefined" ) {
			var editor = tinymce.get( id );
			if( editor && editor instanceof tinymce.Editor ) {
				return editor.getContent({format : 'text'}).substr(0, 512);
			} else {
				return  jQuery('textarea[name='+id+']').val().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
			}
		}
		return '';
	}
<?php echo '</script'; ?>
><?php }
}
