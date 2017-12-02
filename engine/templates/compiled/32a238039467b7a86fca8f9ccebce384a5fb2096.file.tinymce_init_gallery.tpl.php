<?php /* Smarty version Smarty-3.1.18, created on 2017-11-14 14:43:22
         compiled from "engine/templates/html/editor/tinymce_init_gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15158919865a0ae4eae15966-74987018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32a238039467b7a86fca8f9ccebce384a5fb2096' => 
    array (
      0 => 'engine/templates/html/editor/tinymce_init_gallery.tpl',
      1 => 1500386826,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15158919865a0ae4eae15966-74987018',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0ae4eae203b5_20683478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0ae4eae203b5_20683478')) {function content_5a0ae4eae203b5_20683478($_smarty_tpl) {?><script language="javascript" type="text/javascript" src="./templates/js/tinymce/tinymce.min.js"></script>
<script language="javascript">
tinymce.init({
    selector: "textarea.editor_large,textarea.editor_small",
    language : "ru",
	content_css : '/engine/templates/css/tinymce.css',
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern responsivefilemanager"
   ],
   menubar: 'insert view format table tools',
   toolbar1: "styleselect formatselect fontselect fontsizeselect",
   toolbar2: "bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link unlink",
   image_advtab: true,
   paste_word_valid_elements: "b,strong,i,em,h1,h2",
   paste_as_text: true,
   plugin_preview_width: 1170,
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
</script><?php }} ?>
