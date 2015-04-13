<?
	$this->Html->script(array('demo.morris'), array('inline' => false));
	
	$title = array(
		'informers' => $this->ObjectType->getTitle('index', 'Informer'),
		'adverts' => $this->ObjectType->getTitle('index', 'Advert'),
	);
	foreach(array('index', 'create', 'edit', 'stats') as $action) {
		$title[$action] = $this->ObjectType->getTitle($action, 'Campaign');
	}
	
	$url = array(
		'create' => array('controller' => 'Campaigns', 'action' => 'edit')
	);
	$aBreadCrumbs = array(
		array('label' => $title['index'])
	);
?>
<div class="row">
	<div class="col-sm-12 mainFilter">
		<div class="clearfix">
			<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
			<?=$this->element('title', array('title' => $title['index']))?>
		</div>
		<div class="panel panel-dark">
            <div class="panel-body clearfix">
            	<form action="" method="get">
	            	<a class="btn ls-green-btn btn-lg pull-left" href="<?=$this->Html->url($url['create'])?>"><i class="fa fa-plus-circle"></i> <?=$title['create']?></a>
					<span class="filerText"><?=__('Filter by')?></span>
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
					<?//$this->Form->input('date', array('class' => 'datepicker form-control datePickerOnly', 'label' => false, 'div' => false))?>
					<button type="submit" class="btn btn-success"><?=__('Apply')?></button>
					<button class="btn btn-default export"><?=__('Export')?></button>
				</form>
            </div>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-sm-9">
		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Line Chart</h3>
            </div>
            <div class="panel-body no-padding">
                <div id="2LineGraph"></div>
            </div>
        </div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Statistic</h3>
            </div>
            <div class="panel-body">
                <strong style="color: #ff7878">От LentaInform:</strong> 0
				<br /><br />
				<strong style="color: #507d50">К LentaInform:</strong> 0
				<br /><br />
				<strong style="color: #515151">Title:</strong> 0
            </div>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="50%"><?=__('Domain')?></th>
					<th><?=__('Status')?></th>
					<th><?=__('In')?></th>
					<th><?=__('Out')?></th>
					<th><?=__('Factor')?></th>
					<th><?=__('Actions')?></th>
				</tr>
			</thead>
			<tbody>
<?
	foreach($aCampaigns as $row) {
		$status = $aStatusOptions[$row['Campaign']['status']];
		$url = array(
			'edit' => array('controller' => 'Campaigns', 'action' => 'edit', $row['Campaign']['id']),
			'stats' => array('controller' => 'Campaigns', 'action' => 'stats', $row['Campaign']['id']),
			'informers' => array('controller' => 'Informers', 'action' => 'index', $row['Campaign']['id']),
			'adverts' => array('controller' => 'Adverts', 'action' => 'index', $row['Campaign']['id'])
		);
?>
				<tr>
					<td>
						<?=$this->Html->link($row['Campaign']['domain'], $url['edit'])?>
					</td>
					<td><?=$status?> <!--i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i--></td>
					<td class="text-right">0</td>
					<td class="text-right">0</td>
					<td class="">0</td>
					<td class="text-center">
						<a href="<?=$this->Html->url($url['informers'])?>" class="btn btn-xs btn-success tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['informers']?>"><i class="fa fa-eye"></i></a>
						<a href="<?=$this->Html->url($url['stats'])?>" class="btn btn-xs btn-warning tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['stats']?>"><i class="fa fa-bar-chart-o"></i></a>
						<a href="<?=$this->Html->url($url['adverts'])?>" class="btn btn-xs btn-info tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['adverts']?>"><i class="fa fa-tasks"></i></a>
						<a href="<?=$this->Html->url($url['edit'])?>" class="btn btn-xs btn-danger tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['edit']?>"><i class="fa fa-wrench"></i></a>
					</td>
				</tr>
<?
	}
?>
			</tbody>
		</table>
	</div>
</div>