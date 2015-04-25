<?
	$style = array();
	$style['width'] = ($widget['image_size'] == 'custom') ? $widget['custom_image_size'].'px' : $widget['image_size'].'px';
	if ($widget['border_img_size']) {
		$style['border'] = $widget['border_img_size'].'px solid '.$widget['border_img_color'];
	}
	if (in_array($widget['image_pos'], array('left', 'right'))) {
		$style['float'] = $widget['image_pos'];
		$style['margin'] = ($widget['image_pos'] == 'left') ? '0 '.$widget['image_margin'].'px 0 0' : '0 0 0'.$widget['image_margin'].'px';
	}
	echo $this->Html->image('http://'.Configure::read('domain.url').'/img/widget_default_img.png', array('style' => $this->Html->style($style)));