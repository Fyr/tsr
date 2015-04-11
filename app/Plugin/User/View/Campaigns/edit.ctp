<?
	$id = $this->request->data('Campaign.id');
	$title = $this->ObjectType->getTitle(($id) ? 'edit' : 'create', 'Campaign');
?>
<div class="clearfix">
	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title))?>
	<?=$this->element('back', array('url' => array('controller' => 'Campaigns', 'action' => 'index')))?>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<?=$this->Form->create('Campaign', array('class' => 'form-horizontal ls_form'))?>
			<?=$this->Form->hidden('id')?>
		<!--form enctype="multipart/form-data" class="form-horizontal ls_form" action=""-->
			<div class="row ls_divider">
				<label class="col-md-2 control-label"><?=__('Domain')?></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('domain', array('class' => 'form-control', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row ls_divider">
				<label class="col-md-2 control-label"><?=__('Category')?> <i data-original-title="<?=__('Select a campaign category')?>" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('campaign_category_id', array('options' => $aCategoryOptions, 'class' => 'form-control selectize', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row ls_divider">
				<label class="col-md-2 control-label"><?=__('Statistics service')?> <i data-original-title="<?=__('Select a service of statistics')?>" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('stat_service_id', array('options' => $aStatServiceOptions, 'class' => 'form-control selectize', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row ls_divider">
				<label class="col-md-2 control-label"><?=__('Stats.type')?></label>
				<div class="col-md-5 ls-group-input">
					<ul class="nav nav-tabs nav-justified icon-tab">
						<li class="active"><a href="#opened" data-toggle="tab"><?=__('Opened')?></a></li>
						<li><a href="#closed" data-toggle="tab"><?=__('Closed')?></a></li>
					</ul>
					<div class="tab-content tab-border">
						<div class="tab-pane fade in active" id="opened">
							<?=$this->Form->input('stat_url', array('class' => 'form-control', 'label' => false, 'div' => false, 'placeholder' => 'http://yourdomain.com'))?>
						</div>
						<div class="tab-pane fade" id="closed">
							<?=$this->Form->input('login', array('class' => 'form-control', 'div' => false))?>
							<br />
							<?=$this->Form->input('password', array('class' => 'form-control', 'div' => false))?>
						</div>
					</div>
				</div>
			</div>
			<div class="row ls_divider">
				<label class="col-md-2 control-label"><?=__('Site mirrors')?> <i data-original-title="<?=__('Each server on a new line')?>" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('mirrors', array('class' => 'form-control', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row ls_divider last">
				<label class="col-md-2 control-label"><?=__('Comment')?></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('comment', array('class' => 'form-control', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 control-label"></label>
				<div class="col-md-10 ls-group-input">
					<button type="submit" class="btn ls-green-btn btn-lg"><?=__('Save')?></button>
				</div>
			</div>
		<!--/form-->
		<?=$this->Form->end()?>
	</div>
</div>