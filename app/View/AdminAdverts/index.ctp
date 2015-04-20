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
    $aCampaignOptions = Hash::merge(array(0 => '- '.__('Any campaign').' -'), $aCampaignOptions);
?>
<script type="text/javascript">
var aStatusOptions, aCategoryOptions, aCampaignOptions;
$(document).ready(function(){
	aStatusOptions = <?=json_encode($aStatusOptions)?>;
	aCategoryOptions = <?=json_encode($aCategoryOptions)?>;
	aCampaignOptions = <?=json_encode($aCampaignOptions)?>;
	grid_Advert.renderTableFilterCell = function(col, val) {
		var html;
		if (col.key == 'Advert.status') {
			html = grid_Advert.renderFilterSelect(col, val, aStatusOptions);
		} else if (col.key == 'Advert.advert_category_id') {
			html = grid_Advert.renderFilterSelect(col, val, aCategoryOptions);
		} else if (col.key == 'Advert.campaign_id') {
			html = grid_Advert.renderFilterSelect(col, val, aCampaignOptions);
		} else {
			html = grid_Advert.renderFilterCell(col, val);
		}
		return '<th>' + html + '</th>';
	}
	
	grid_Advert.renderTableCell = function(val, col, rowData) {
		var html = '';
		if (col.key == 'Advert.status') {
			html = aStatusOptions[val];
		} else if (col.key == 'Advert.advert_category_id') {
			html = aCategoryOptions[val];
		} else if (col.key == 'Advert.campaign_id') {
			html = aCampaignOptions[val];
		} else {
			html = grid_Advert.renderCell(val, col, rowData);
		}
		return '<td>' + html + '</td>';
	}
	grid_Advert.init();
	grid_Advert.render();
});

</script>