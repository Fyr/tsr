<?
	$style = 'width: '.$widget['image_size'].'px; ';
	if ($widget['border_img_size']) {
		$style.= 'border: '.$widget['border_img_size'].'px solid '.$widget['border_img_color'];
	}
	echo $this->Html->image('https://imgn.marketgid.com/200x200/3397/3397561_origin.jpg', array('style' => $style));