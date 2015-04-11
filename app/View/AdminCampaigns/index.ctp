<?
	$title = $this->ObjectType->getTitle('index', $objectType);
	$createURL = $this->Html->url(array('action' => 'edit', 0));
	$createTitle = $this->ObjectType->getTitle('create', $objectType);
	
    $actions = $this->PHTableGrid->getDefaultActions($objectType);
	$actions['table']['add']['href'] = $createURL;
	$actions['table']['add']['label'] = $createTitle;
	
	$backURL = $this->Html->url(array('action' => 'index'));
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
    $aCategoryOptions = Hash::merge(array(0 => '- '.__('Any category').' -'), $aCategoryOptions);
    $aUserOptions = Hash::merge(array(0 => '- '.__('Any user').' -'), $aUserOptions);
?>
<script type="text/javascript">
var aStatusOptions, aCategoryOptions, aUserOptions;
$(document).ready(function(){
	aStatusOptions = <?=json_encode($aStatusOptions)?>;
	aCategoryOptions = <?=json_encode($aCategoryOptions)?>;
	aUserOptions = <?=json_encode($aUserOptions)?>;
	console.log(aUserOptions);
	grid_Campaign.renderTableFilterCell = function(col, val) {
		var html;
		if (col.key == 'Campaign.status') {
			html = grid_Campaign.renderFilterSelect(col, val, aStatusOptions);
		} else if (col.key == 'Campaign.campaign_category_id') {
			html = grid_Campaign.renderFilterSelect(col, val, aCategoryOptions);
		} else {
			html = grid_Campaign.renderFilterCell(col, val);
		}
		return '<th>' + html + '</th>';
	}
	
	grid_Campaign.renderTableCell = function(val, col, rowData) {
		var html = '';
		if (col.key == 'Campaign.status') {
			html = aStatusOptions[val];
		} else if (col.key == 'Campaign.campaign_category_id') {
			html = aCategoryOptions[val];
		} else if (col.key == 'Campaign.user_id') {
			html = aUserOptions[val];
		} else {
			html = grid_Campaign.renderCell(val, col, rowData);
		}
		return '<td>' + html + '</td>';
	}
	grid_Campaign.init();
	grid_Campaign.render();
});

</script>