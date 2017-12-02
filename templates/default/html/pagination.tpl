{if $products|count>2 || $total_pages_num>1}
	<div class="pagination">
	{if $total_pages_num>1}
		{$visible_pages = 7}
		{$page_from = 1}
		{if $current_page_num > floor($visible_pages/2)}{$page_from = max(1, $current_page_num-floor($visible_pages/2)-1)}{/if}
		{if $current_page_num > $total_pages_num-ceil($visible_pages/2)}{$page_from = max(1, $total_pages_num-$visible_pages-1)}{/if}
		{$page_to = min($page_from+$visible_pages, $total_pages_num-1)}
		<a {if $current_page_num==1}class="selected"{/if} href="{url page=null}">{if $current_page_num==1}1{elseif $total_pages_num < $visible_pages}1{else}&lt;&lt;{/if}</a>
		{if $visible_pages < $total_pages_num-1 && $current_page_num > ($visible_pages-1)/2+2}<a class="prev_page_link" href="{url page=$current_page_num-floor($visible_pages/2)}">&lt;</a>{/if}			
			{section name=pages loop=$page_to start=$page_from}
			{$p = $smarty.section.pages.index+1}
			{if ($p == $page_from+1 && $p!=2) || ($p == $page_to && $p != $total_pages_num-1)}
			{else}<a {if $p==$current_page_num}class="selected"{/if} href="{url page=$p}">{$p}</a>{/if}
			{/section}
		{if $visible_pages < $total_pages_num-1 && $total_pages_num - $current_page_num > $visible_pages/2 + 1}<a class="next_page_link" href="{url page=$current_page_num + floor($visible_pages/2)}">	&gt;</a>{/if}			
		<a {if $current_page_num==$total_pages_num}class="selected"{/if}  href="{url page=$total_pages_num}">{if $current_page_num==$total_pages_num}{$total_pages_num}{elseif $total_pages_num < $visible_pages}{$total_pages_num}{else}&gt;&gt;{/if}</a>
	{/if}
	</div>
{/if}