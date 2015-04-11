<?
	// $this->Html->script('demo.morris', array('inline' => false));
	$this->Html->script(array('demo.morris'), array('inline' => false));
	$title = $this->ObjectType->getTitle('index', 'Campaign');
	$createTitle = $this->ObjectType->getTitle('create', 'Campaign');
	$createUrl = array('controller' => 'Campaigns', 'action' => 'edit');
?>
<div class="row">
	<div class="col-sm-12 mainFilter">
		<?=$this->element('title', array('title' => $title))?>
		<div class="panel panel-dark">
            <div class="panel-body clearfix">
            	<form action="" method="get">
	            	<a class="btn ls-green-btn btn-lg pull-left" href="<?=$this->Html->url($createUrl)?>"><i class="fa fa-plus-circle"></i> <?=$createTitle?></a>
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
	$title = array(
		'campaignEdit' => $this->ObjectType->getTitle('edit', 'Campaign'),
		'informers' => $this->ObjectType->getTitle('index', 'Informer'),
		'adverts' => $this->ObjectType->getTitle('index', 'Advert'),
		'campaignStats' => $this->ObjectType->getTitle('stats', 'Campaign')
	);
	foreach($aCampaigns as $row) {
		$status = $aStatusOptions[$row['Campaign']['status']];
		$url = array(
			'campaignEdit' => array('controller' => 'Campaigns', 'action' => 'edit', $row['Campaign']['id']),
			'campaignStats' => array('controller' => 'Campaigns', 'action' => 'stats', $row['Campaign']['id']),
			'informers' => array('controller' => 'Informers', 'action' => 'index', $row['Campaign']['id']),
			'adverts' => array('controller' => 'Adverts', 'action' => 'index', $row['Campaign']['id'])
		);
?>
				<tr>
					<td>
						<?=$this->Html->link($row['Campaign']['domain'], array('controller' => 'Campaigns', 'action' => 'edit', $row['Campaign']['id']))?>
					</td>
					<td><?=$status?> <!--i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i--></td>
					<td class="text-right">0</td>
					<td class="text-right">0</td>
					<td class="">0</td>
					<td class="text-center">
						<a href="<?=$this->Html->url($url['informers'])?>" class="btn btn-xs btn-success tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['informers']?>"><i class="fa fa-eye"></i></a>
						<a href="<?=$this->Html->url($url['campaignStats'])?>" class="btn btn-xs btn-warning tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['campaignStats']?>"><i class="fa fa-bar-chart-o"></i></a>
						<a href="<?=$this->Html->url($url['adverts'])?>" class="btn btn-xs btn-info tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['adverts']?>"><i class="fa fa-tasks"></i></a>
						<a href="<?=$this->Html->url($url['campaignEdit'])?>" class="btn btn-xs btn-danger tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['campaignEdit']?>"><i class="fa fa-wrench"></i></a>
					</td>
				</tr>
<?
	}
?>
			</tbody>
		</table>
	</div>
</div>