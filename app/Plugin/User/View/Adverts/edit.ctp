<?
	$this->Html->script(array('vendor/jquery/jquery.Jcrop.min'), array('inline' => false));
	
	$campaign_id = $campaign['Campaign']['id'];
	$id = $this->request->data('Advert.id');
	$title = $this->ObjectType->getTitle(($id) ? 'edit' : 'create', 'Advert');
?>
<div class="clearfix">
	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title))?>
	<?=$this->element('back', array('url' => array('controller' => 'Adverts', 'action' => 'index', $campaign_id)))?>
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
					<div class="form-group">
						<label><?=__('Title')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Описание"></i>
						<?=$this->Form->input('title', array('class' => 'form-control', 'label' => false, 'div' => false))?>
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
								<input id="userAvatarChoose" class="fileBrowse fileuploader" type="file" data-object_type="User" data-object_id="<?=$campaign_id?>" data-progress_id="progress-User<?=$campaign_id?>" accept="image/*"/>
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