<div class="bs-block">
	<div class="image"><a href="products/{$product->url}"><img src="{$product->image->filename|resize:272:348}" alt="{$product->name|escape}"/>
	<div class="p-more"><span>{if $language->id == 2}Детальніше{elseif $language->id == 4}More{else}Подробнее{/if}</span></div></a>
	{if $product->variant->compare_price}<div class="product-discount">-{((1-$product->variant->price/$product->variant->compare_price)*100)|convert}%</div>{/if}
	</div>
	<div class="price-row">{$product->variant->price|convert} {$currency->sign} {if $currency->id != 3}<span class="usd">(${$product->variant->price|convert:3})</span>{/if} {if $product->variant->compare_price}<span class="old-price">{$product->variant->compare_price|convert} {$currency->sign}</span>{/if}</div>
	<div class="product-name"><h3>{$product->name|escape}</h3></div>
	<div class="more"><a href="products/{$product->url}">{if $language->id == 2}Детальніше{elseif $language->id == 4}Learn more{else}Подробнее{/if}</a></div>
</div>