<div id="slider" class="slider">
	<div class="slider-box">
		<div id="iview">
			{get_slides var=slides}
			{if $slides}
			{foreach from=$slides item=slide}
				{if $slide->link}<a href="{$slide->link}" data-iview:image="files/slider/{$slide->filename}"></a>{else}<div data-iview:image="files/slider/{$slide->filename}"></div>{/if}
			{/foreach}
			{/if}
		</div>
	</div>
</div>