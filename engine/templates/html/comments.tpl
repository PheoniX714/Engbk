{* Title *}
{$meta_title='Отзывы' scope=parent}
{$sm_groupe = 'comments' scope=parent}
{$page_additional_css = '
	<link rel="stylesheet" href="./templates/js/plugins/iCheck/minimal/blue.css">
' scope=parent}
{$page_additional_js = '
	<script src="./templates/js/plugins/iCheck/icheck.min.js"></script>
	<script src="./templates/js/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="./templates/js/jquery.sticky.js"></script>
	<script src="./templates/js/modules/comments.js"></script>
' scope=parent}

<section class="content-header">
	<h1>Комментарии<small>Модерация комментариев и добавление ответов</small></h1>
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home"></i> Главная</a></li>
		<li class="active">Комментарии</li>
	</ol>
</section>

<section class="content">
<form id="list_form" method="post">
<!-- Main row -->
  <div class="row">
	<!-- Left col -->
	<div class="col-md-12">
	  <div class="box box-success"> 
		<div class="box-header">
		  <i class="fa fa-comment"></i>
		  <h3 class="box-title" style="line-height:1.5">Список комментариев</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<input type="hidden" name="session_id" value="{$smarty.session.id}">   
			<table class="table table-striped table-bordered table-hover tabled-view black-th" id="functional-table">
                <tbody>
				<tr>
					<th class="checkbox-cell ln-inherit">
						<input type="checkbox" class="minimal checkbox-toggle">
					</th>
					<th>Комментарий</th>
				</tr>
				{if $comments}
                {foreach $comments as $comment}
				<tr>
					<td class="checkbox-cell">
						<input type="checkbox" class="minimal" name="check[]" value="{$comment->id}" />
					</td>
					<td class="text-cell">
						<div class="comment_name">
						<b>{$comment->name|escape}</b> {if $comment->phone}({$comment->phone|escape}){/if} {if !$comment->approved}<a class="approve" style="color:green; font-weight:bold;" href="#"><i>Одобрить</i></a>{/if} <i><a href="{url module=CommentAdmin id=$comment->id return=$smarty.server.REQUEST_URI}" style="color:red">Написать ответ</a></i>
						</div>
						<div class="comment_text">
						{$comment->text|escape|nl2br}
						</div>
						<div class="comment_info"><i>
						Отзыв оставлен {$comment->date|date} в {$comment->date|time}
						{if $comment->type == 'product'}
						к товару <a target="_blank" href="{$config->root_url}/products/{$comment->product->url}#comment_{$comment->id}">{$comment->product->name}</a>
						{elseif $comment->type == 'otzyvy'}
						на сранице <a target="_blank" href="{$config->root_url}/otzyvy">Отзывы</a>
						{/if}</i>
						</div>
					</td>
						
				</tr>
				{/foreach}
				{else}
				<tr>
					<td colspan="4">
						<b>Новости отсутствуют</b>
					</td>
				</tr>
				{/if}
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->		
	  </div>
	</div>
	  
	<div class="col-sm-12">
		{include file='pagination.tpl'}
	</div>
	  
	<div class="col-sm-2">
		<div class="form-group">
			<select id="action" class="form-control" name="action">
				<option value="">Действие</option>
				<option value="approve">Одобрить</option>
				<option value="delete">Удалить</option>
			</select>
		</div>
	</div>
	
	<div class="col-lg-2 col-md-2">
		<button type="submit" class="btn btn-block btn-success btn-flat" value="Применить">Применить</button>
	</div>
	
  </div>
  <!-- /.row -->
</form>
</section>