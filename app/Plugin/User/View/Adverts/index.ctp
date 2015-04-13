<?
	$title = array();
	foreach(array('index', 'create', 'edit', 'block') as $action) {
		$title[$action] = $this->ObjectType->getTitle($action, 'Advert');
	}
	
	$url = array(
		'campaigns' => array('controller' => 'Campaigns', 'action' => 'index'),
		'create' => array('controller' => 'Adverts', 'action' => 'edit', 0, $campaign['Campaign']['id'])
	);
	$aBreadCrumbs = array(
		array('label' => $this->ObjectType->getTitle('index', 'Campaign'), 'url' => $url['campaigns']),
		array('label' => $campaign['Campaign']['domain']),
		array('label' => $title['index'])
	);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="clearfix">
			<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
        	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title['index']))?>
        	<?=$this->element('back', array('url' => $url['campaigns']))?>
		</div>
		<div class="panel panel-dark">
            <div class="panel-body advertsSearch clearfix">
            	<form action="" method="get">
				<a href="<?=$this->Html->url($url['create'])?>" class="btn ls-green-btn btn-lg"><i class="fa fa-plus-circle"></i> <?=$title['create']?></a>
				<div class="findBlock">
				<!--
					<label><?=__('Find')?></label>
					<?=$this->Form->input('keyword', array('class' => 'form-control', 'label' => false, 'div' => false))?>  -->
					<label><?=__('Category')?></label>
<?
	$aCategoryOptions = array_merge(array(0 => '- '.__('Any category').' -'), $aCategoryOptions);
	$options = array(
		'class' => 'selectize', 
		'options' => $aCategoryOptions, 
		'label' => false, 
		'div' => false, 
		'value' => $this->request->query('data.advert_category_id')
	);
?>
					<?=$this->Form->input('advert_category_id', $options)?>
				</div>
				<div class="statusBlock">
					<label><?=__('Status')?></label>
<?
	$aStatusOptions = array_merge(array(0 => '- '.__('Any status').' -'), $aStatusOptions);
	$options = array(
		'class' => 'selectize', 
		'options' => $aStatusOptions, 
		'label' => false, 
		'div' => false, 
		'value' => $this->request->query('data.status')
	);
?>
					<?=$this->Form->input('status', $options)?>
				</div>
				<!--
				<div class="dateBlock">
					<label><?=__('Creation date')?></label>
					<?=$this->Form->input('created', array('class' => 'form-control datePickerOnly', 'div' => false, 'label' => false))?>
				</div>
				-->
				<button type="submit" class="btn btn-success apply"><?=__('Apply')?></button>
				<button class="btn btn-default export"><?=__('Export')?></button>
				</form>
            </div>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive ls-table">
		<table class="table table-bordered table-striped advertList">
			<thead>
				<tr>
					<th width="3%"><input type="checkbox" /></th>
					<th width="15%">ID / Status</th>
					<th width="30%">Preview / Title / Description / Category</th>
					<th width="15%">Shows <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="15%">Clicks <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="7%">CTR <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
<?
/*
	$title = array(
		'advertEdit' => $this->ObjectType->getTitle('edit', 'Advert'),
		'advertDelete' => $this->ObjectType->getTitle('delete', 'Advert'),
		'advertBlock' => $this->ObjectType->getTitle('index', 'Advert'),
	);
	*/
	foreach($aAdverts as $row) {
		$id = $row['Advert']['id'];
		$status = $aStatusOptions[$row['Advert']['status']];
		$category = $aCategoryOptions[$row['Advert']['advert_category_id']];
?>
					<td><input type="checkbox" /></td>
					<td>
						<?=$id?><br />
						<?=$status?>
						<i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i>
					</td>
					<td class="clearfix">
						<img alt="" src="https://dashboard.lentainform.com/tmp/img/1/imgn/3432/3432979_b.jpg?t=1428008400" width="120" height="120" class="thumb" />
						<div class="adContent">
							<div class="title"><?=$row['Advert']['title']?></div>
							<div class="description"><?=$row['Advert']['descr']?></div>
							<span class="label label-danger"><?=$category?></span>
						</div>
					</td>
					<td class="text-right">
						<strong style="color: #ff7878"><?=__('Today:')?></strong> 0<br /><br />
						<strong style="color: #507d50"><?=__('Yesterday:')?></strong> 0<br /><br />
						<strong style="color: #515151"><?=__('Total:')?></strong> 0
					</td>
					<td class="text-right">
						<strong style="color: #ff7878"><?=__('Today:')?></strong> 0<br /><br />
						<strong style="color: #507d50"><?=__('Yesterday:')?></strong> 0<br /><br />
						<strong style="color: #515151"><?=__('Total:')?></strong> 0
					</td>
					<td class="text-right">0,000</td>
					<td class="text-center">
						<a href="<?=$this->Html->url(array('controller' => 'Adverts', 'action' => 'block', $id))?>" class="btn btn-xs btn-warning tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['block']?>"><i class="fa fa-lock"></i></a>
						<a href="<?=$this->Html->url(array('controller' => 'Adverts', 'action' => 'edit', $id))?>" class="btn btn-xs btn-info tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['edit']?>"><i class="fa fa-edit"></i></a>
						<a href="<?=$this->Html->url(array('controller' => 'Adverts', 'action' => 'delete', $id))?>" class="btn btn-xs btn-danger tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('Delete')?>"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<tr>
					<td colspan="7" class="fullLink">
						<?=$this->Html->link($row['Advert']['url'], $row['Advert']['url'])?>
					</td>
				</tr>
<?
	}
?>
			</tbody>
		</table>
		</div>
	</div>
</div>