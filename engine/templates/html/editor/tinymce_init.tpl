<script language="javascript" type="text/javascript" src="./templates/js/tinymce/tinymce.min.js"></script>
<script language="javascript">
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
   {literal}
   link_class_list: [
		{title: 'Нет', value: ''},
		{title: 'Увеличение изображения', value: 'fancybox'}
   ],
   
   {/literal}
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
	{literal}
	templates: [],
	template_popup_width: 1170
	
	}{/literal});
	function myCustomGetContent( id ) {
		if( typeof tinymce != "undefined" ) {
			var editor = tinymce.get( id );
			if( editor && editor instanceof tinymce.Editor ) {
				return editor.getContent{literal}({format : 'text'}{/literal}).substr(0, 512);
			} else {
				return  jQuery('textarea[name='+id+']').val().replace(/(<([^>]+)>)/ig," ").replace(/(\&nbsp;)/ig," ").replace(/^\s+|\s+$/g, '').substr(0, 512);
			}
		}
		return '';
	}
</script>