{if $pages_count>1}   
<!-- Листалка страниц -->

<ul class="pagination">
	
	{* Количество выводимых ссылок на страницы *}
	{$visible_pages = 11}

	{* По умолчанию начинаем вывод со страницы 1 *}
	{$page_from = 1}
	
	{* Если выбранная пользователем страница дальше середины "окна" - начинаем вывод уже не с первой *}
	{if $current_page > floor($visible_pages/2)}
		{$page_from = max(1, $current_page-floor($visible_pages/2)-1)}
	{/if}	
	
	{* Если выбранная пользователем страница близка к концу навигации - начинаем с "конца-окно" *}
	{if $current_page > $pages_count-ceil($visible_pages/2)}
		{$page_from = max(1, $pages_count-$visible_pages-1)}
	{/if}
	
	{* До какой страницы выводить - выводим всё окно, но не более ощего количества страниц *}
	{$page_to = min($page_from+$visible_pages, $pages_count-1)}

	{* Ссылка на 1 страницу отображается всегда *}
	<li {if $current_page==1}class="active"{else}{/if}><a href="{url page=1}">1</a></li>
	
	{* Выводим страницы нашего "окна" *}	
	{section name=pages loop=$page_to start=$page_from}
		{* Номер текущей выводимой страницы *}	
		{$p = $smarty.section.pages.index+1}	
		{* Для крайних страниц "окна" выводим троеточие, если окно не возле границы навигации *}	
		{if ($p == $page_from+1 && $p!=2) || ($p == $page_to && $p != $pages_count-1)}	
		<li {if $p==$current_page}class="active"{/if}><a href="{url page=$p}">...</a></li>
		{else}
		<li {if $p==$current_page}class="active"{else}{/if}><a href="{url page=$p}">{$p}</a></li>
		{/if}
	{/section}

	{* Ссылка на последнююю страницу отображается всегда *}
	<li {if $current_page==$pages_count}class="active"{else}{/if}><a href="{url page=$pages_count}">{$pages_count}</a></li>
	
	<li><a href="{url page=all}">все сразу</a></li>
	
</ul>
<!-- Листалка страниц (The End) -->
{/if}