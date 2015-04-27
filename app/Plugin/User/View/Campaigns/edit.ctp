<?
	$id = $this->request->data('Campaign.id');
	$title = $this->ObjectType->getTitle(($id) ? 'edit' : 'create', 'Campaign');
	$urlIndex = array('controller' => 'Campaigns', 'action' => 'index');
	$aBreadCrumbs = array(
		array('label' => $this->ObjectType->getTitle('index', 'Campaign'), 'url' => $urlIndex),
		array('label' => $title)
	);
?>
<div class="clearfix">
	<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title))?>
	<?=$this->element('back', array('url' => $urlIndex))?>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<?=$this->Form->create('Campaign', array('class' => 'form-horizontal ls_form'))?>
			<div>
				<h5><?=__('Your site')?></h5>
			</div>
			<div class="row">
				<label class="col-md-2 control-label"><?=__('Domain')?><!--i data-original-title="<?=__('Input new domain or choose existing one')?>" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i--></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('Domain.domain', array('class' => 'form-control', 'label' => false, 'div' => false, 'placeholder' => 'yournewdomain.com'))?>
					
<?
/*
	if (!$id) {
?>
					<div class="row">
						<div class="col-md-6">
							<?=$this->Form->input('Domain.domain', array('class' => 'form-control', 'label' => false, 'div' => false, 'placeholer' => 'http://yournewdomain.com'))?>
						</div>
<?
	}
?>
						<div class="col-md-6">
<?
	$aDomainOptions = Hash::merge(array(0 => '- '.__('New domain').' -'), $aDomainOptions);
?>
							<?=$this->Form->input('Campaign.domain_id', array('options' => $aDomainOptions, 'class' => 'form-control selectize', 'label' => false, 'div' => false))?>
						</div>
					</div>

<?
	*/
?>
					
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 control-label"><?=__('Site category')?> <i data-original-title="<?=__('Select site category')?>" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('Domain.site_category_id', array('options' => $aCategoryOptions, 'class' => 'form-control selectize', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 control-label"><?=__('Statistics service')?> <i data-original-title="<?=__('Select a service of statistics')?>" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('Domain.stat_service_id', array('options' => $aStatServiceOptions, 'class' => 'form-control selectize', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 control-label"><?=__('Stats.type')?></label>
				<div class="col-md-5 ls-group-input">
					<ul class="nav nav-tabs nav-justified icon-tab">
						<li class="active"><a href="#opened" data-toggle="tab"><?=__('Opened')?></a></li>
						<li><a href="#closed" data-toggle="tab"><?=__('Closed')?></a></li>
					</ul>
					<div class="tab-content tab-border">
						<div class="tab-pane fade in active" id="opened">
							<?=$this->Form->input('Domain.stat_url', array('class' => 'form-control', 'label' => false, 'div' => false, 'placeholder' => 'http://yourdomain.com'))?>
						</div>
						<div class="tab-pane fade" id="closed">
							<?=$this->Form->input('Domain.login', array('class' => 'form-control', 'div' => false))?>
							<br />
							<?=$this->Form->input('Domain.password', array('class' => 'form-control', 'div' => false))?>
						</div>
					</div>
				</div>
			</div>
			<div class="row ls_divider">
				<label class="col-md-2 control-label"><?=__('Site mirrors')?> <i data-original-title="<?=__('Each server on a new line')?>" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('Domain.mirrors', array('class' => 'form-control', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div>
				<h5><?=__('Campaign info')?></h5>
			</div>
			<div class="row">
				<label class="col-md-2 control-label"><?=__('Campaign title')?></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('Campaign.title', array('class' => 'form-control', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row last">
				<label class="col-md-2 control-label"><?=__('Comment')?></label>
				<div class="col-md-10 ls-group-input">
					<?=$this->Form->input('Campaign.comment', array('class' => 'form-control', 'label' => false, 'div' => false))?>
				</div>
			</div>
			<div class="row">
				<label class="col-md-2 control-label"></label>
				<div class="col-md-10 ls-group-input">
					<button type="submit" class="btn ls-green-btn btn-lg"><?=__('Save')?></button>
				</div>
			</div>
		<?=$this->Form->end()?>
	</div>
</div>