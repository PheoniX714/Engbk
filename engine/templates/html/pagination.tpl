{if $pages_count>1}   
<!-- Листалка страниц -->

{* Количество выводимых ссылок на страницы *}
{$visible_pages = 3}

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

<nav aria-label="Page navigation example" class="mt-3">
    <ul class="pagination">
		<li class="page-item {if $current_page==1}active{/if}"><a class="page-link" href="{url page=1}">1</a></li>
		
		{* Выводим страницы нашего "окна" *}	
		{section name=pages loop=$page_to start=$page_from}
			{* Номер текущей выводимой страницы *}	
			{$p = $smarty.section.pages.index+1}	
			{* Для крайних страниц "окна" выводим троеточие, если окно не возле границы навигации *}	
			{if ($p == $page_from+1 && $p!=2) || ($p == $page_to && $p != $pages_count-1)}
			<li class="page-item {if $p==$current_page}active{/if}"><a class="page-link" href="{url page=$p}">...</a></li>
			{else}
			<li class="page-item {if $p==$current_page}active{/if}"><a class="page-link" href="{url page=$p}">{$p}</a></li>
			{/if}
		{/section}
        
		<li class="page-item {if $current_page==$pages_count}active{/if}"><a class="page-link" href="{url page=$pages_count}">{$pages_count}</a></li>
		<li class="page-item"><a class="page-link" href="{url page=all}">все сразу</a></li>
    </ul>
</nav>

{/if}