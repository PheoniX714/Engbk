{* Шаблон текстовой страницы *}

{* Канонический адрес страницы *}
{$canonical="/{$page->url}" scope='root'}

<div class="text-block">
	<h2>{$page->name|escape}</h2>
		{$page->text}
</div>
