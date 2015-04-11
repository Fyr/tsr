<?
	// $this->Html->script('demo.morris', array('inline' => false));
	$this->Html->script(array('demo.morris'), array('inline' => false));
	$createTitle = $this->ObjectType->getTitle('create', 'Campaign');
	$createUrl = array('controller' => 'Campaigns', 'action' => 'edit');
?>
<div class="row">
	<div class="col-sm-12 mainFilter">
		<div class="clearfix">
			<?=$this->element('title', array('class' => 'pull-left', 'title' => $this->ObjectType->getTitle('stats', 'Campaign')))?>
			<?=$this->element('back', array('url' => array('controller' => 'Campaigns', 'action' => 'index')))?>
		</div>
		<div class="panel panel-dark">
            <div class="panel-body clearfix">
            	<form action="" method="get">
	            	<a class="btn ls-green-btn btn-lg pull-left" href="<?=$this->Html->url($createUrl)?>"><i class="fa fa-plus-circle"></i> <?=$createTitle?></a>
	            	<div class="findBlock">
						<?=$this->Form->input('date', array('class' => 'form-control', 'label' => false, 'div' => false))?>
					</div>
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
					<th><?=__('Date')?></th>
					<th><?=__('In')?></th>
					<th><?=__('Out')?></th>
					<th><?=__('Factor')?></th>
				</tr>
			</thead>
			<tbody>
<?
	foreach($aStats as $row) {
?>
				<tr>
					<td><?=$row['Stats']['date']?></td>
					<td class="text-right">0</td>
					<td class="text-right">0</td>
					<td class="">0</td>
				</tr>
<?
	}
?>
			</tbody>
		</table>
	</div>
</div>