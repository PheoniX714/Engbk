{if $page->id == 4}
<section class="catalog-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 cat-top-img">
				<a href=""><img src="templates/default/img/catalog1.jpg"></a>
			</div>
			<div class="col-lg-12 cat-row">
				<div class="cat-left-box">
					<a href=""><img src="templates/default/img/cat_sale.jpg"></a>
				</div>
				<div class="cat-right-box">
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/feshn">{if $language->id == 2}Фешн{elseif $language->id == 4}Fashion{else}Фэшн{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/feshn"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/klassika">{if $language->id == 2}Класика{elseif $language->id == 4}Classic{else}Классика{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/klassika"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/kezhual">{if $language->id == 2}Кежуал{elseif $language->id == 4}Casual{else}Кэжуал{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/kezhual"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="col-lg-12 cat-row">
				<div class="cat-left-box">
					<a href=""><img src="templates/default/img/cat_best.jpg"></a>
				</div>
				<div class="cat-right-box">
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/sport">{if $language->id == 2}Спорт{elseif $language->id == 4}Sport{else}Спорт{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/sport"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/pizhamy">{if $language->id == 2}Піжами{elseif $language->id == 4}Sleep wear{else}Пижамы{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/pizhamy"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/obuv">{if $language->id == 2}Взуття{elseif $language->id == 4}Shoes{else}Обувь{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/obuv"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			
			<div class="col-lg-12 cat-row">
				<div class="cat-left-box">
					<a href=""><img src="templates/default/img/cat_best.jpg"></a>
				</div>
				<div class="cat-right-box">
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/aksessuary">{if $language->id == 2}Аксесуари{elseif $language->id == 4}Fashion{else}Аксессуары{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/aksessuary"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/kosmetika">{if $language->id == 2}Косметика{elseif $language->id == 4}Fashion{else}Косметика{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/kosmetika"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="cat-v-line">
						<div class="cat-v-title"><a href="/catalog/kupalniki">{if $language->id == 2}Купальники{elseif $language->id == 4}Fashion{else}Купальники{/if}</a></div>
						<div class="cat-v-img"><a href="/catalog/kupalniki"><img src="templates/default/img/cat_1.jpg"></a></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</section>
{else}
<section class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="path"><a href="./">Главная</a> / {$page->header|escape}</div>
				
				<div class="page-text">
					{$page->body}
				</div>
			</div>
		</div>
	</div>
</section>
{/if}