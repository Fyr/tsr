<?
	$title = $this->ObjectType->getTitle('index', $objectType);
	$createURL = $this->Html->url(array('action' => 'edit', 0));
	$createTitle = $this->ObjectType->getTitle('create', $objectType);
	
    $actions = $this->PHTableGrid->getDefaultActions($objectType);
	$actions['table']['add']['href'] = $createURL;
	$actions['table']['add']['label'] = $createTitle;
	
	$backURL = $this->Html->url(array('action' => 'index'));
	unset($actions['row']['delete']); // delete icon - last in list
	$settingsURL = $this->Html->url(array('plugin' => 'user', 'controller' => 'Widgets', 'action' => 'edit')).'/{$id}';
	$actions['row']['settings'] = $this->Html->link('', $settingsURL, array('class' => 'icon-color icon-wrench', 'title' => __('User settings')));
	$deleteURL = $this->Html->url(array('action' => 'delete')).'/{$id}?model='.$objectType.'&backURL='.urlencode($backURL);
	$actions['row']['delete'] = $this->Html->link('', $deleteURL, array('class' => 'icon-color icon-delete', 'title' => __('Delete record')), __('Are you sure to delete this record?'));
?>
<?=$this->element('admin_title', compact('title'))?>
<div class="text-center">
    <a class="btn btn-primary" href="<?=$createURL?>">
        <i class="icon-white icon-plus"></i> <?=$createTitle?>
    </a>
</div>
<br/>
<?
    echo $this->PHTableGrid->render($objectType, array(
    	'actions' => $actions,
    	'init' => false
    ));
    
    $aStatusOptions = Hash::merge(array(0 => '- '.__('Any status').' -'), $aStatusOptions);
    $aCampaignOptions = Hash::merge(array(0 => '- '.__('Any campaign').' -'), $aCampaignOptions);
    // $aCategoryOptions = Hash::merge(array(0 => '- '.__('Any category').' -'), $aCategoryOptions);
?>
<script type="text/javascript">
var aStatusOptions, aCampaignOptions;
$(document).ready(function(){
	aStatusOptions = <?=json_encode($aStatusOptions)?>;
	aCampaignOptions = <?=json_encode($aCampaignOptions)?>;
	grid_Widget.renderTableFilterCell = function(col, val) {
		var html;
		if (col.key == 'Widget.status') {
			html = grid_Widget.renderFilterSelect(col, val, aStatusOptions);
		} else if (col.key == 'Widget.campaign_id') {
			html = grid_Widget.renderFilterSelect(col, val, aCampaignOptions);
		} else {
			html = grid_Widget.renderFilterCell(col, val);
		}
		return '<th>' + html + '</th>';
	}
	
	grid_Widget.renderTableCell = function(val, col, rowData) {
		var html = '';
		if (col.key == 'Widget.status') {
			html = aStatusOptions[val];
		} else if (col.key == 'Widget.campaign_id') {
			html = aCampaignOptions[val];
		} else {
			html = grid_Widget.renderCell(val, col, rowData);
		}
		return '<td>' + html + '</td>';
	}
	grid_Widget.init();
	grid_Widget.render();
});

</script>