{* Страница товара *}
{$og_type="product" scope="root"}
{$og_image="{$product->image->filename|resize:530:430}" scope="root"}

{* Канонический адрес страницы *}
{$canonical="/products/{$product->url}" scope="root"}

{$add_script = '
	<link href="templates/default/css/jquery.fancybox.min.css" rel="stylesheet">
	<script type="text/javascript" src="templates/default/js/jquery.fancybox.min.js"></script>
	<script>
		$("[data-fancybox="gallery"]").fancybox();
	</script>
' scope="root"}

<div id="product">
	<div class="product-cont">
		<div class="images-block">
			{if $product->image}
			<div class="image">
				<a href="{$product->image->filename|resize:1500:900:w}" data-fancybox="gallery"><img src="{$product->image->filename|resize:475:475}" alt="{$product->product->name|escape}" data-large="/files/originals/{$product->image->filename}" /></a>
			</div>
			{/if}
			{if $product->images|count>1}
			<div class="images">
				{* cut удаляет первую фотографию, если нужно начать 2-й - пишем cut:2 и тд *}
				{foreach $product->images|cut as $i=>$image}
					<a href="{$image->filename|resize:1500:900:w}" data-fancybox="gallery"><img src="{$image->filename|resize:200:200}" alt="{$product->name|escape}" /></a>
				{/foreach}
			</div>
			{/if}
		</div>
		<div class="product-info">
			<h1>{$product->name|escape}</h1>
			
			<div class="description">{$product->body}</div>
				
			<form class="variants" action="/cart">
				<div class="price">
					{if $product->variant->compare_price > 0}
					<strike>
					{$product->variant->compare_price|convert} {$currency->sign|escape}
					</strike>
					{/if}
					<span>{$product->variant->price|convert} {$currency->sign|escape}</span>
					
				</div>
				
				{foreach from=$product->variants item=v name=variants}
				<table>		
				<tr><td><input name="variant" value="{$v->id}" type="radio" checked style="display:none;" />
				</td>
				<td>
				
				<div class="amount-select">
					<input type="button" value="-" class="button add1" onClick="javascript:this.form.amount.value= this.form.amount.value<=1 ? 1 :parseInt(this.form.amount.value)-1 ;">
					<input type="text" class="amount-input" name="amount" value="1" autocomplete="off">
					<input type="button" value="+" class="button add2" onClick="javascript:this.form.amount.value= this.form.amount.value>=100 ? 100 :parseInt(this.form.amount.value)+1 ;">
					<input type="submit" class="cart-but" value="В корзину" data-result-text="Добавить еще"/>
				</div>
				
				</td></tr>
				</table>
				{/foreach}
				
			</form>
			
		</div>
	</div>
</div>