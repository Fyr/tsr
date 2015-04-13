<?
	$this->Html->script(array('vendor/jquery/jquery.Jcrop.min'), array('inline' => false));
	
	$id = $this->request->data('Advert.id');
	$title = $this->ObjectType->getTitle(($id) ? 'edit' : 'create', 'Advert');
	
	$url = array(
		'campaigns' => array('controller' => 'Campaigns', 'action' => 'index'),
		'index' => array('controller' => 'Adverts', 'action' => 'index', $campaign['Campaign']['id'])
	);
	$aBreadCrumbs = array(
		array('label' => $this->ObjectType->getTitle('index', 'Campaign'), 'url' => $url['campaigns']),
		array('label' => $campaign['Campaign']['domain']),
		array('label' => $this->ObjectType->getTitle('index', 'Advert'), 'url' => $url['index']),
		array('label' => $title)
	);
?>
<div class="clearfix">
	<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title))?>
	<?=$this->element('back', array('url' => $url['index']))?>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<?=$this->Form->create('Advert', array('class' => 'ls_form'))?>
		<?=$this->Form->hidden('id')?>
		<?=$this->Form->hidden('campaign_id')?>
		<!--form class="ls_form" role="form"-->
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label><?=__('Link')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Описание"></i>
						<?=$this->Form->input('url', array('class' => 'form-control', 'label' => false, 'div' => false))?>
					</div>
					<div class="form-group clearfix">
						<label><?=__('Title')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Описание"></i>
						<?=$this->Form->input('title', array('class' => 'form-control', 'label' => false, 'div' => false))?>
						<span class="small pull-right"><?=__('%s chars left')?></span>
					</div>
					<div class="form-group">
						<label><?=__('Description')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Описание"></i>
						<?=$this->Form->input('descr', array('class' => 'form-control', 'label' => false, 'div' => false))?>
					</div>
					<div class="form-group">
						<label><?=__('Image')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Описание"></i>
						<div class="row">
							<div class="col-sm-8">
								<?=$this->Form->input('img_url', array('class' => 'form-control', 'label' => false, 'div' => false))?>
							</div>
							<div class="col-sm-4">
								<input id="userAvatarChoose" class="fileBrowse fileuploader" type="file" data-object_type="User" data-object_id="<?=$campaign['Campaign']['id']?>" data-progress_id="progress-User<?=$campaign['Campaign']['id']?>" accept="image/*"/>
							</div>	
						</div>
					</div>
					<div class="form-group">
						<label><?=__('Category')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Описание"></i>
						<?=$this->Form->input('advert_category_id', array('options' => $aCategoryOptions, 'class' => 'form-control selectize', 'label' => false, 'div' => false))?>
					</div>
					<div class="form-group clearfix">
						<button type="submit" class="btn ls-green-btn btn-lg pull-left"><?=__('Save')?></button>
						<button class="btn btn-primary btn-lg pull-right">Проверка правописания</button>
                    </div>
				</div>
			</div>
		<?=$this->Form->end()?>
	</div>
</div>
<script type="text/javascript">

</script>