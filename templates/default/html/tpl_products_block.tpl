<div class="product" id="product_{$product->id}">

	<div class="image">
		<a href="products/{$product->url}" class="p_images main_img" data-imgId="{$product->image->id}"><img src="{$product->image->filename|resize:200:295}" alt="{$product->visible_name|escape}"/></a>
		{if $product->group_products}
		{foreach $product->group_products as $pg}
		{if $pg->color}
		<a href="products/{$pg->url}" id="image_{$pg->image->id}" class="p_images" style="display:none;"><img src="{$pg->image->filename|resize:200:295}" alt="{$pg->visible_name|escape}"/></a>
		{/if}
		{/foreach}		
		<div class="products-colors-list">
			{foreach $product->group_products as $pg}
			{if $pg->color and $pg->id != $product->id}
			<div class="product-color"><a href="products/{$pg->url}#product" data-pId="{$product->id}" data-imgId="{$pg->image->id}" style="background:#{$pg->color};">1</a></div>
			{/if}
			{/foreach}
		</div>
		{/if}
		
		{if $product->variant->compare_price}<div class="product-discount">-{((1-$product->variant->price/$product->variant->compare_price)*100)|convert}%</div>{/if}
	</div>

	<div class="product_info">

		<h3><a data-product="{$product->id}" href="products/{$product->url}">{$product->visible_name|escape}</a></h3>
		
		<div class="p-left-block">
			<p class="p-sku">Код {$product->variant->sku}</p>
			{if $product->variant->compare_price}<p class="p-compare-price">{$product->variant->compare_price|convert} {$currency->sign|escape}</p>{/if}
			<p class="p-price {if !$product->variant->compare_price}only{/if}">{$product->variant->price|convert} {$currency->sign|escape}</p>
			
		</div>
		
		<div class="p-right-block">
			<a class="more" href="products/{$product->url}">Подробнее</a>
		</div>
		<div class="clear"></div>
	</div>
</div>