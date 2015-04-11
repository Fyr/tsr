<?
	$title = $this->ObjectType->getTitle('index', $objectType);
	if ($objectType == 'SubcategoryArticle' && $objectID) {
		$title = Hash::get($categoryArticle, 'CategoryArticle.title').': '.$title;
	} elseif ($objectType == 'CarSubtype' && $objectID) {
		$title = Hash::get($carType, 'CarType.title').': '.$title;
	}
    $createURL = $this->Html->url(array('action' => 'edit', 0, $objectType, $objectID));
    $createTitle = $this->ObjectType->getTitle('create', $objectType);
    
    $actions = $this->PHTableGrid->getDefaultActions($objectType);
    $actions['table']['add']['href'] = $createURL;
    $actions['table']['add']['label'] = $createTitle;
    $actions['row']['edit']['href'] = $this->Html->url(array('action' => 'edit', '~id', $objectType, $objectID));

    if ($objectType == 'CategoryArticle') {
    	$actions['row'][] = array(
    		'label' => $this->ObjectType->getTitle('index', 'SubcategoryArticle'), 
    		'class' => 'icon-color icon-open-folder', 
    		'href' => $this->Html->url(array('action' => 'index', 'SubcategoryArticle', '~id'))
    	);
    }
    
	$columns = $this->PHTableGrid->getDefaultColumns($objectType);
?>
<?=$this->element('admin_title', compact('title'))?>
<div class="text-center">
<?
	if ($objectType == 'News') {
		/*
?>
	<a class="btn btn-success" href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index', 'CategoryNews'))?>">
        <?=$this->ObjectType->getTitle('index', 'CategoryNews')?>
    </a>
<?
	} elseif ($objectType == 'CategoryNews') {
?>
	<a class="btn btn-success" href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index', 'News'))?>">
        <?=$this->ObjectType->getTitle('index', 'News')?>
    </a>
<?
	} elseif ($objectType == 'SiteArticle') {
?>
	<a class="btn btn-success" href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index', 'CategoryArticle'))?>">
        <?=$this->ObjectType->getTitle('index', 'CategoryArticle')?>
    </a>
<?
	} elseif ($objectType == 'CategoryArticle') {
?>
	<a class="btn btn-success" href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index', 'SiteArticle'))?>">
        <?=$this->ObjectType->getTitle('index', 'SiteArticle')?>
    </a>
<?
	} elseif ($objectType == 'SubcategoryArticle') {
?>
	<a class="btn btn-success" href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index', 'SiteArticle'))?>">
        <?=$this->ObjectType->getTitle('index', 'SiteArticle')?>
    </a>
    <a class="btn btn-success" href="<?=$this->Html->url(array('controller' => 'AdminContent', 'action' => 'index', 'CategoryArticle'))?>">
        <?=$this->ObjectType->getTitle('index', 'CategoryArticle')?>
    </a>
<?
		*/
	}
?>
    <a class="btn btn-primary" href="<?=$createURL?>">
        <i class="icon-white icon-plus"></i> <?=$createTitle?>
    </a>
</div>
<br/>
<?
    echo $this->PHTableGrid->render($objectType, array(
        'baseURL' => $this->ObjectType->getBaseURL($objectType, $objectID),
        'actions' => $actions,
        'columns' => $columns,
        'data' => $aRowset
    ));
?>