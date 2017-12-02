<section id="slider" class="slider hidden-xs">
	<div class="slider-box">
		<div id="iview">
			{get_slides var=slides}
			{if $slides}
			{foreach from=$slides[1] item=slide}
				{if $slide->link}<a href="{$slide->link}" data-iview:image="files/uploads/{$slide->filename}"></a>{else}<div data-iview:image="files/uploads/{$slide->filename}"></div>{/if}
			{/foreach}
			{/if}
		</div>
	</div>
</section>