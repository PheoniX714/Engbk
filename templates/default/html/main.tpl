{$wrapper = 'index.tpl' scope='root'}

{* Канонический адрес страницы *}
{$canonical="" scope='root'}

<div class="main-small-categories">
{foreach $categories as $c}
{if $c->id == 2}
{$pp = [1,5,4,11,14,3,13,51,9]}
{foreach $c->subcategories as $c}
	{if $c->visible and in_array($c->id, $pp)}
	<div class="ms-cat">
		<a href="catalog/{$c->url}" data-category="{$c->id}" ><img src="files/category/{$c->image}"></a>
		<div class="c-title"><a href="catalog/{$c->url}" data-category="{$c->id}" >{$c->name|escape}</a></div>
	</div>
	{/if}
{/foreach}
{/if}
{/foreach}
</div>

<div class="main-big-categories">
{foreach $categories as $c}
	{if $c->visible and $c->id != 2}
	<div class="mb-cat">
		<a href="catalog/{$c->url}" data-category="{$c->id}" ><img src="files/category/{$c->image}"></a>
		<div class="c-title"><a href="catalog/{$c->url}" data-category="{$c->id}" >{$c->name|escape}</a></div>
	</div>
	{/if}
{/foreach}
</div>