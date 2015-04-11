<?
	// $this->Html->script('demo.morris', array('inline' => false));
	$this->Html->script(array('demo.morris'), array('inline' => false));
?>
<div class="row">
	<div class="col-sm-12 mainFilter">
		<h3 class="ls-top-header"><?=__('Campaigns')?></h3>
		<div class="panel panel-dark">
            <div class="panel-body clearfix">
            	<form action="" method="get">
	            	<a class="btn ls-green-btn btn-lg pull-left" href="<?=$this->Html->url(array('controller' => 'Campaigns', 'action' => 'edit'))?>"><i class="fa fa-plus-circle"></i> <?=__('Add campaign')?></a>
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
?>
				<tr>
					<td><?=$row['Campaign']['domain']?></td>
					<td><?=$status?> <!--i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i--></td>
					<td class="text-right">0</td>
					<td class="text-right">0</td>
					<td class="">0</td>
					<td class="text-center">
						<button class="btn btn-xs btn-success tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Информеры"><i class="fa fa-eye"></i></button>
						<button class="btn btn-xs btn-warning tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Статистика"><i class="fa fa-bar-chart-o"></i></button>
						<button class="btn btn-xs btn-info tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Объявления"><i class="fa fa-tasks"></i></button>
						<a href="<?=$this->Html->url(array('controller' => 'Campaigns', 'action' => 'edit', $row['Campaign']['id']))?>" class="btn btn-xs btn-danger tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('Settings')?>"><i class="fa fa-wrench"></i></a>
					</td>
				</tr>
<?
	}
?>
			</tbody>
		</table>
	</div>
</div>