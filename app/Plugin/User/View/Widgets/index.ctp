<?
	$title = array();
	foreach(array('index', 'create', 'edit', 'stats', 'block', 'unblock') as $action) {
		$title[$action] = $this->ObjectType->getTitle($action, 'Widget');
	}
	$url = array(
		'create' => array('controller' => 'Widgets', 'action' => 'edit', 0, $campaign['Campaign']['id']),
		'campaigns' => array('controller' => 'Campaigns', 'action' => 'index')
	);
	$aBreadCrumbs = array(
		array('label' => $this->ObjectType->getTitle('index', 'Campaign'), 'url' => $url['campaigns']),
		array('label' => $campaign['Campaign']['title']),
		array('label' => $title['index'])
	);
?>
<div class="row">
	<div class="col-sm-12 mainFilter">
		<div class="clearfix">
			<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
        	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title['index']))?>
        	<?=$this->element('back', array('url' => $url['campaigns']))?>
		</div>
		<div class="panel panel-dark">
            <div class="panel-body clearfix">
            	<form action="" method="get">
				<a href="<?=$this->Html->url($url['create'])?>" class="btn ls-green-btn btn-lg pull-left"><i class="fa fa-plus-circle"></i> <?=$title['create']?></a>
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
				<!--div class="dateBlock">
					<label><?=__('Creation date')?></label>
					<?=$this->Form->input('created', array('class' => 'form-control datePickerOnly', 'div' => false, 'label' => false))?>
				</div-->
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
					<th width="15%">Title / ID</th>
					<th width="30%">Status</th>
					<th width="15%">Shows <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="15%">Clicks <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="7%">CTR <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
<?
	foreach($aWidgets as $row) {
		$id = $row['Widget']['id'];
		$status = $aStatusOptions[$row['Widget']['status']];
?>
				<tr>
					<td><input type="checkbox" /></td>
					<td>
						<?=$row['Widget']['title']?> <br />
						<?=$id?>
						<!--i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i-->
					</td>
					<td class="clearfix">
						<?=$status?>
					</td>
					<td class="text-right">
						0
					</td>
					<td class="text-right">
						0
					</td>
					<td class="text-right">0,000</td>
					<td class="text-center">
<?
	if ($row['Widget']['status'] == WidgetStatus::BLOCKED) {
?>
						<a href="<?=$this->Html->url(array('controller' => 'Widgets', 'action' => 'block', $id, 0))?>" class="btn btn-xs btn-success tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['unblock']?>"><i class="fa fa-play"></i></a>
<?
	} elseif ($row['Widget']['status'] == WidgetStatus::ACTIVE) {
?>
						<a href="<?=$this->Html->url(array('controller' => 'Widgets', 'action' => 'block', $id, 1))?>" class="btn btn-xs btn-warning tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['block']?>"><i class="fa fa-pause"></i></a>
<?
	}
?>
						<a href="<?=$this->Html->url(array('controller' => 'Widgets', 'action' => 'stats', $id))?>" class="btn btn-xs btn-info tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['stats']?>"><i class="fa fa-bar-chart-o"></i></a>
						<a href="<?=$this->Html->url(array('controller' => 'Widgets', 'action' => 'edit', $id))?>" class="btn btn-xs btn-primary tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['edit']?>"><i class="fa fa-wrench"></i></a>
						<a id="widget_<?=$id?>" data-target="#getCode" data-toggle="modal" href="javascript: void(0)" class="btn btn-xs btn-warning tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('Show code')?>"><i class="fa fa-code"></i></a>
						<a href="<?=$this->Html->url(array('controller' => 'Widgets', 'action' => 'delete', $id))?>" class="btn btn-xs btn-danger tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('Delete')?>"><i class="fa fa-times"></i></a>
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
<script type="text/javascript">
$(document).ready(function(){
	$('#getCode').on('show.bs.modal', function(e){
		var id = $(e.relatedTarget).prop('id').replace(/widget_/, '');
		$('#getCode .modal-body textarea').val('<!-- <?=Configure::read('domain.title')?> Widget: begin -->\n' + '<' + 'script src="http://<?=Configure::read('domain.url')?>/widget/script/' + id + '"' + '><' +  '/script' + '>' + '\n<!-- <?=Configure::read('domain.title')?> Widget: end -->');
	});
});
</script>
<div class="modal fade" id="getCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header label-success white">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=__('This is a code for your widget. Just copy and paste it into a place on the page where the widget must be displayed.')?></h4>
			</div>
			<div class="modal-body">
				<textarea class="form-control" style="height:100px"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>