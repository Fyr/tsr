<?
	$class = 'info';
	if ($msg = $this->Session->flash('success')) {
		$class = 'success';
	} elseif ($msg = $this->Session->flash('error')) {
		$class = 'danger';
	} else {
		$msg = $this->Session->flash('info');
	}
	if ($msg) {
?>
<div class="alert <?=($class) ? 'alert-'.$class : ''?>">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?=$msg?>
</div>
<?
	}
?>