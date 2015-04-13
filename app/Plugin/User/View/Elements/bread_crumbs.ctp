<?
	$homeURL = array('controller' => 'Dashboard', 'action' => 'index');
	if ($aBreadCrumbs) {
?>
<ol class="breadcrumb">
	<li><a href="<?=$this->Html->url($homeURL)?>"><i class="fa fa-home"></i></a></li>
<?
		foreach($aBreadCrumbs as $item) {
			if (isset($item['url'])) {
?>
	<li><?=$this->Html->link($item['label'], $item['url'])?></li>
		
<?
			} else {
?>
	<li class="active"><?=$item['label']?></li>
<?
			}
		}
?>
</ol> 
<?
	}
?>
