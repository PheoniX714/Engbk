<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
	
		<div class="aside-content bg-primary-700 text-auto">

			<div class="aside-toolbar">

				<div class="logo">
					<img src="./templates/img/logo-32.png">
					<span class="logo-text">FastCMS</span>
				</div>

				<button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
					<i class="icon icon-backburger"></i>
				</button>

			</div>

			<ul class="nav flex-column" id="sidenav" data-children=".nav-item">

				<li class="subheader">
					<span>ОСНОВНОЕ МЕНЮ</span>
				</li>
				{if 'orders'|in_array:$manager->permissions}
				<li class="nav-item" role="tab" id="heading-orders">
					<a class="nav-link ripple with-arrow {if $sm_groupe != 'orders'}collapsed{/if}" data-toggle="collapse" data-target="#collapse-orders" href="#" aria-expanded="false" aria-controls="collapse-orders">
						<i class="icon s-4 icon-cart"></i>
						<span>Заказы</span>
					</a>
					<ul id="collapse-orders" class="collapse {if $sm_groupe == 'orders'}show{/if}" role="tabpanel" aria-labelledby="heading-orders" data-children=".nav-item">
						<li class="nav-item">
							<a class="nav-link {if $sm_item == '0'}active{/if} ripple " href="./index.php?module=OrdersAdmin&status=0" data-url="./index.php?module=OrdersAdmin&status=0">
								<span>Новые</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {if $sm_item == '1'}active{/if} ripple " href="./index.php?module=OrdersAdmin&status=1" data-url="./index.php?module=OrdersAdmin&status=1">
								<span>Принятые</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {if $sm_item == '2'}active{/if} ripple " href="./index.php?module=OrdersAdmin&status=2" data-url="./index.php?module=OrdersAdmin&status=2">
								<span>Выполненые</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {if $sm_item == '3'}active{/if} ripple " href="./index.php?module=OrdersAdmin&status=3" data-url="./index.php?module=OrdersAdmin&status=3">
								<span>Удаленные</span>
							</a>
						</li>

					</ul>
				</li>
				{/if}
				{if 'products'|in_array:$manager->permissions}
				<li class="nav-item" role="tab" id="heading-products">
					<a class="nav-link ripple with-arrow {if $sm_groupe != 'products'}collapsed{/if}" data-toggle="collapse" data-target="#collapse-products" href="#" aria-expanded="false" aria-controls="collapse-products">
						<i class="icon s-4 icon-microsoft"></i>
						<span>Каталог товаров</span>
					</a>
					<ul id="collapse-products" class="collapse {if $sm_groupe == 'products'}show{/if}" role="tabpanel" aria-labelledby="heading-products" data-children=".nav-item">
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'products'}active{/if} ripple " href="./index.php?module=ProductsAdmin" data-url="./index.php?module=ProductsAdmin">
								<span>Список товаров</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'categories'}active{/if} ripple" href="./index.php?module=CategoriesAdmin" data-url="./index.php?module=CategoriesAdmin">
								<span>Категории товаров</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'features'}active{/if} ripple" href="./index.php?module=FeaturesAdmin" data-url="./index.php?module=FeaturesAdmin">
								<span>Свойства товаров</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'brands'}active{/if} ripple" href="./index.php?module=BrandsAdmin" data-url="./index.php?module=BrandsAdmin">
								<span>Бренды</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'import'}active{/if} ripple" href="./index.php?module=ProductsImportAdmin" data-url="./index.php?module=ProductsImportAdmin">
								<span>Импорт товаров</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'export'}active{/if} ripple" href="./index.php?module=ProductsExportAdmin" data-url="./index.php?module=ProductsExportAdmin">
								<span>Экспорт товаров</span>
							</a>
						</li>
					</ul>
				</li>
				{/if}
				{if 'news'|in_array:$manager->permissions}
				<li class="nav-item" role="tab" id="heading-news">

					<a class="nav-link ripple with-arrow {if $sm_groupe != 'news'}collapsed{/if}" data-toggle="collapse" data-target="#collapse-news" href="#" aria-expanded="false" aria-controls="collapse-ecommerce">

						<i class="icon s-4 icon-newspaper"></i>

						<span>Новости</span>
					</a>
					<ul id="collapse-news" class="collapse bg-primary-500 {if $sm_groupe == 'news'}show{/if}" role="tabpanel" aria-labelledby="heading-news" data-children=".nav-item">

						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'news'}active{/if} ripple " href="./index.php?module=NewsAdmin" data-url="./index.php?module=NewsAdmin">
								<span>Список новостей</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'news_categories'}active{/if} ripple " href="./index.php?module=NewsCategoriesAdmin" data-url="./index.php?module=NewsCategoriesAdmin">
								<span>Категории новостей</span>
							</a>
						</li>
						
					</ul>
				</li>
				{/if}
				{if 'pages'|in_array:$manager->permissions}
				<li class="nav-item">
					<a class="nav-link {if $sm_groupe == 'site_menu'}active{/if} ripple " href="./index.php?module=SiteMenusAdmin" data-url="./index.php?module=SiteMenusAdmin">
						<i class="icon s-4 icon-menu"></i>
						<span>Меню сайта</span>
					</a>
				</li>
				{/if}
				{if 'pages'|in_array:$manager->permissions}
				<li class="nav-item" role="tab" id="heading-pages">

					<a class="nav-link ripple with-arrow {if $sm_groupe != 'pages'}collapsed{/if}" data-toggle="collapse" data-target="#collapse-pages" href="#" aria-expanded="false" aria-controls="collapse-pages">

						<i class="icon s-4 icon-file-multiple"></i>

						<span>Статические страницы</span>
					</a>
					<ul id="collapse-pages" class="collapse bg-primary-500 {if $sm_groupe == 'pages'}show{/if}" role="tabpanel" aria-labelledby="heading-pages" data-children=".nav-item">
						{foreach $menus as $m}
						<li class="nav-item">
							<a class='nav-link {if $sm_item == "menu_{$m->id}"}active{/if} ripple' href="{url module=PagesAdmin menu_id=$m->id}" data-url="{url module=PagesAdmin menu_id=$m->id}">
								<span>{$m->name}</span>
							</a>
						</li>
						{/foreach}						
					</ul>
				</li>
				{/if}
				{if 'slider'|in_array:$manager->permissions}			
				<li class="nav-item">
					<a class="nav-link {if $sm_groupe == 'slider'}active{/if} ripple " href="./index.php?module=SliderAdmin" data-url="./index.php?module=SliderAdmin">
						<i class="icon s-4 icon-picture"></i>
						<span>Слайдер</span>
					</a>
				</li>
				{/if}
				{if 'settings'|in_array:$manager->permissions or 'languages'|in_array:$manager->permissions or 'managers'|in_array:$manager->permissions}
				<li class="nav-item" role="tab" id="heading-settings">
					<a class="nav-link ripple with-arrow {if $sm_groupe != 'settings'}collapsed{/if}" data-toggle="collapse" data-target="#collapse-settings" href="#" aria-expanded="false" aria-controls="collapse-ecommerce">
						<i class="icon s-4 icon-settings"></i>
						<span>Настройки</span>
					</a>
					<ul id="collapse-settings" class="collapse bg-primary-500 {if $sm_groupe == 'settings'}show{/if}" role="tabpanel" aria-labelledby="heading-settings" data-children=".nav-item">
						{if 'settings'|in_array:$manager->permissions}
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'settings'}active{/if} ripple " href="./index.php?module=SettingsAdmin" data-url="./index.php?module=SettingsAdmin">
								<span>Настройки сайта</span>
							</a>
						</li>
						{/if}
						{if 'languages'|in_array:$manager->permissions}
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'languages'}active{/if} ripple " href="./index.php?module=LanguagesAdmin" data-url="./index.php?module=LanguagesAdmin">
								<span>Языки</span>
							</a>
						</li>
						{/if}
						{if 'managers'|in_array:$manager->permissions}
						<li class="nav-item">
							<a class="nav-link {if $sm_item == 'managers'}active{/if} ripple " href="./index.php?module=ManagersAdmin" data-url="./index.php?module=ManagersAdmin">
								<span>Менеджеры</span>
							</a>
						</li>
						{/if}
					</ul>
				</li>
				{/if}
			</ul>
		</div>
</aside>