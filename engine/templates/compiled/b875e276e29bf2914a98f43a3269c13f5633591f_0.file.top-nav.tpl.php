<?php
/* Smarty version 3.1.32, created on 2020-02-10 16:17:48
  from '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/top-nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5e41660c7b0cb9_63325565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b875e276e29bf2914a98f43a3269c13f5633591f' => 
    array (
      0 => '/home/astyle/a-style.kh.ua/dev2/engine/templates/html/top-nav.tpl',
      1 => 1527789025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e41660c7b0cb9_63325565 (Smarty_Internal_Template $_smarty_tpl) {
?><nav id="toolbar" class="bg-white">
	<div class="row no-gutters align-items-center flex-nowrap">

		<div class="col">

			<div class="row no-gutters align-items-center flex-nowrap">

				<button type="button" class="toggle-aside-button btn btn-icon d-block d-lg-none" data-fuse-bar-toggle="aside">
					<i class="icon icon-menu"></i>
				</button>

				<div class="toolbar-separator d-block d-lg-none"></div>

				<div class="shortcuts-wrapper row no-gutters align-items-center px-0 px-sm-2">

					<div class="shortcuts row no-gutters align-items-center d-none d-md-flex">

						<a href="apps-chat.html" class="shortcut-button btn btn-icon mx-1">
							<i class="icon icon-cart"></i> 0
						</a>

						<a href="apps-contacts.html" class="shortcut-button btn btn-icon mx-1">
							<i class="icon icon-hangouts"></i> 0
						</a>

						<a href="apps-mail.html" class="shortcut-button btn btn-icon mx-1">
							<i class="icon icon-email"></i> 0
						</a>

					</div>
				</div>

				<div class="toolbar-separator"></div>

			</div>
		</div>

		<div class="col-auto">

			<div class="row no-gutters align-items-center justify-content-end">	
				<a href="/" target="__blank" class="tn-link ripple fuse-ripple-ready px-3">
					<div class="row no-gutters align-items-center flex-nowrap py-5">
						<i class="icon icon-reply text-blue-700"></i>
						<span class="px-3">На сайт</span>
					</div>
				</a>

				<div class="toolbar-separator"></div>

				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'logout'),$_smarty_tpl ) );?>
" class="tn-link ripple fuse-ripple-ready px-3">
					<div class="row no-gutters align-items-center flex-nowrap py-5">
						<i class="icon icon-logout text-red-A700"></i>
						<span class="px-2">Выход</span>
					</div>
				</a>
			</div>
		</div>
	</div>
</nav>
<?php }
}
