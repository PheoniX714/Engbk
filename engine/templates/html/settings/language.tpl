{$sm_groupe = 'settings' scope='root'}
{$sm_item = 'languages' scope='root'}
{$sm_sub_item = 'languages' scope='root'}
{if $l->id}
{$meta_title = $l->name scope='root'}
{else}
{$meta_title = 'Новый язык' scope='root'}
{/if}

<div id="contacts" class="page-layout simple left-sidebar-floating tabbed">

	<div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-4 p-sm-6">
		<div class="col">
			<div class="row no-gutters align-items-center flex-nowrap">
				<div class="logo row no-gutters align-items-center flex-nowrap">
					<span class="logo-icon mr-4">
						<i class="icon-translate s-6"></i>
					</span>
					<span class="logo-text h4">{if $l->id}{$l->name}{else}Новый язык{/if}</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="page-content">
		<ul class="nav nav-tabs blue-tabs">
			
			<li class="nav-item">
				<a class='nav-link btn {if $sm_sub_item == "languages"}active{/if}' href="{url module=LanguagesAdmin id=null}" >Список языков</a>
			</li>
			
			<li class="nav-item">
				<a class='nav-link btn {if $sm_sub_item == "lang_constants"}active{/if}' href="{url module=LangConstantsAdmin menu_id=$m->id}" >Языковые константы</a>
			</li>

		</ul>
	</div>
	
	<form method="post">
	<input type=hidden name="session_id" value="{$smarty.session.id}">
	<input name=id type="hidden" value="{$l->id|escape}"/>
		
	<div class="page-content-wrapper">
		<div class="page-content p-4 p-sm-6">
			<div class="widget-group row no-gutters">
				
				{if $message_success}
				<div class="col-md-12 p-3 animated fadeIn">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<h4><i class="icon icon-check"></i> {if $message_success=='added'}Язык добавлен{elseif $message_success=='updated'}Язык обновлен{else}{$message_success|escape}{/if}</h4>
					</div>
				</div>
				{/if}
				
				{if $message_error}
				<div class="col-md-12 p-3 animated fadeIn">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<h4><i class="icon fa fa-ban"></i> {if $message_error=='empty_name'}Введите название языка{elseif $message_error=='empty_code'}Введите ISO код языка{else}{$message_error|escape}{/if}</h4>
					</div>
				</div>
				{/if}
				
				<div class="col-md-12 col-xs-12 p-3 animated fadeInLeft">

					<div class="card mb-3">
						
						<div class="widget-content row px-4 pt-6">
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" aria-describedby="headerHelp" placeholder="Введите название" value="{$l->name|escape}">
									<label for="name">Название </label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="visible_name" name="visible_name" aria-describedby="headerHelp" placeholder="Введите название на сайте" value="{$l->visible_name|escape}">
									<label for="visible_name">Название на сайте</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<input type="text" class="form-control" id="code" name="code" aria-describedby="headerHelp" placeholder="Введите ISO код" value="{$l->code|escape}">
									<label for="code">Код ISO (2 символа)</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group pt-0">
									<label for="currency_id" class="col-form-label pb-0">Связанная валюта</label>
									<select class="form-control" id="currency_id" name="currency_id">
										<option value="0">По умолчанию</option>
										{foreach $currencies as $c}
										<option {if $l->currency_id == $c->id}selected{/if} value="{$c->id}">{$c->name|escape}</option>
										{/foreach}
									</select>									
								</div>
							</div>
							
						</div>
						
						<div class="divider"></div>
						
						<div class="widget-footer row px-4 py-6">
							<div class="col-md-12 text-right">
								<button class="btn btn-success btn-sm fuse-ripple-ready" type="submit" value="Сохранить">Сохранить</button>
							</div>
						</div>
					
					</div>
				
				</div>
			</div>
		</div>
	</div>
	</form>
</div>