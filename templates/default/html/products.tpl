{* Список товаров *}

{* Канонический адрес страницы *}
{if $category && $brand}
{$canonical="/catalog/{$category->url}/{$brand->url}" scope='root'}
{elseif $category}
{$canonical="/catalog/{$category->url}" scope='root'}
{elseif $brand}
{$canonical="/brands/{$brand->url}" scope='root'}
{elseif $keyword}
{$canonical="/products?keyword={$keyword|escape}" scope='root'}
{else}
{$canonical="/products" scope='root'}
{/if}


<!-- Хлебные крошки 
<div class="col-md-12" id="path">
	<a href="./">Главная</a>
	{foreach $category->path as $cat}
	- <a href="catalog/{$cat->url}">{$cat->name|escape}</a>
	{/foreach}
	{if $brand}
	- <a href="catalog/{$cat->url}/{$brand->url}">{$brand->name|escape}</a>
	{/if}
	{if $product->name}
	-  {$product->name|escape}
	{/if}
</div>
 Хлебные крошки #End /-->

{if $category->id == 2 or  $category->id == 6 or  $category->id == 7 or  $category->id == 8 or  $category->id == 34}
{$pp = [35,36,37,38]}
	<div class="row categories-title">
		<div class="col-md-12">
			<h1>{$category->name|escape}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 categories-list">
		{foreach $category->subcategories as $sc}
		{if $sc->visible}
			<div class="subcat-box">
				{if $sc->image}<div class="subcat-img"><a href="{if in_array($sc->id, $pp)}{else}/catalog{/if}/{$sc->url}"><img src="/files/category/{$sc->image}"></a></div>{/if}
				<div class="subcat-title"><a href="{if in_array($sc->id, $pp)}{else}/catalog{/if}/{$sc->url}" {if $sc->id == 13}style="font-size:10px;"{/if}>{$sc->name}</a></div>
			</div>
		{/if}
		{/foreach}
		</div>
	</div>
{else}

{if $keyword}
<div class="row categories-title">
	<div class="col-md-12">
		<h1>Поиск: {$keyword|escape}</h1>
	</div>
</div>
{/if}

{if $category->image}
<div class="category-image">
<img src="files/category/{$category->image}">
</div>
{/if}
{if $category->name}
<h1 class="category-name">
{$category->name}
</h1>
{/if}
{if $category->description}
<div class="category-text">
{* Описание категории *}
{$category->description}
</div>
{/if}

{if $category->id == 30}
<div class="p-calculators" style="margin:20px 0">
{literal}
<script type="text/javascript">
function changeText0(){
var rezultat = 1;
rezultat *= (Math.PI * (Math.pow(parseFloat(document.getElementById('d').value), 2) / 100) ) / 4;
rezultat *= parseFloat(document.getElementById('p').value);
document.getElementById('rezultat').innerHTML = rezultat.toFixed(3);
}
</script>
{/literal}
<form onsubmit="return false;" oninput="changeText0()">
<p><span>Диаметр поршня d, мм</span> <input id="d" type="number"></p>
<p><span>Давление системы P, ат (обычно 6 ат)</span> <input id="p" type="number"></p>
<p><span>Сила давления F, кгc:</span> <output id="rezultat"></output></p>
</form>

{literal}
<script type="text/javascript">
function changeText1(){
var rezultat1 = 1;
rezultat1 *= Math.sqrt( (4 * parseFloat(document.getElementById('f1').value) ) / (Math.PI * parseFloat(document.getElementById('p1').value) ) );
document.getElementById('rezultat1').innerHTML = 10*rezultat1.toFixed(3);
}
</script>
{/literal}
<form onsubmit="return false;" oninput="changeText1()">
<p><span>Сила давления F, кгc</span> <input id="f1" type="number"></p>
<p><span>Давление системы P, ат (обычно 6 ат)</span> <input id="p1" type="number"></p>
<p><span>Диаметр поршня d, мм:</span> <output id="rezultat1"></output></p>
</form>

</div>
{/if}
<!--Каталог товаров-->
{if $products}

<div class="row products-category">
	
	<div class="col-md-12">
		<div class="row products">
			<table id="p-list" class="table table-striped">
            <tbody>
			  {if $features}
			  <tr class="t-header">
                <td colspan="4">
					<div id="features">
						{foreach from=$features key=key item=f name=ft}
							{foreach from=$f->options item=o name=op}
								<a href="{url params=[$f->id=>$o->value, page=>null]}#p-list" {if $smarty.get[$f@key]== $o->value}class="selected"{/if}>{$o->value|escape}</a>{if !$smarty.foreach.op.last} | {/if}
							{/foreach}
						{/foreach}
					</div>
				</td>
              </tr>
			  {/if}
			{foreach $products as $product}
              <tr>
				<form class="variants" action="/cart">
                <td class="id{$product->id} nb-l p-name">{if $product->featured}<a href="products/{$product->url}">{$product->name}</a>{else}{$product->name}{/if}</td>
                <td class="price">
					{foreach $product->variants as $v}
					<input id="variants_{$v->id}" name="variant" value="{$v->id}" type="radio" class="variant_radiobutton" {if $v@first}checked{/if} style="display:none;" />
					{if $v->compare_price > 0}<span class="compare_price">{$v->compare_price|convert}</span>{/if}
					<span class="id{$product->id} price">{$v->price|convert} <span class="currency">{$currency->sign|escape}</span></span>
					{/foreach}
				</td>
				<td class="amount">
					<div class="am">
						<input type="button" value="-" class="button add1" onclick="javascript:this.form.amount.value= this.form.amount.value<=1 ? 1 :parseInt(this.form.amount.value)-1 ;">
						<input type="text" class="amount-input" name="amount" value="1">
						<input type="button" value="+" class="button add2" onclick="javascript:this.form.amount.value= this.form.amount.value>=100 ? 100 :parseInt(this.form.amount.value)+1 ;">
					</div>
				</td>
                <td class="to-cart nb-r"><input type="submit" class="button cart-but" value="в корзину" data-result-text="добавить еще"/></td>
				</form>
				{/foreach}
              </tr>
			
			  <tr class="pagination-tr">
                <td colspan="4">{include file='pagination.tpl'}&nbsp;</td>
              </tr>
			</tbody>
          </table>
		</div>
	</div>
<!-- Список товаров (The End)-->

{if $category->url == 'poliamid'}
{literal}
<!-- Google Code for &#1055;&#1086;&#1083;&#1080;&#1072;&#1084;&#1080;&#1076; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 978369648;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "6aN9CJrLknUQ8PjC0gM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/978369648/?label=6aN9CJrLknUQ8PjC0gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript> 
{/literal}
{elseif $category->url == 'polipropilen'}

{literal}
<!-- Google Code for &#1055;&#1086;&#1083;&#1080;&#1087;&#1088;&#1086;&#1087;&#1080;&#1083;&#1077;&#1085; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 978369648;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "tI4WCP2-mHUQ8PjC0gM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/978369648/?label=tI4WCP2-mHUQ8PjC0gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript> 
{/literal}

{/if}

</div>
{else}
<div class="col-md-12 no-products">Товары не найдены</div>
{/if}

{/if}
<!--Каталог товаров (The End)-->