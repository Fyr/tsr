<?
	$style = 'font-size: '.$widget['font_size'].'px; ';
	$style.= 'color: '.$widget['font_color'].'; ';
	$style.= 'font-weight: '.$widget['font_weight'].'; ';
	$style.= 'font-family: '.$widget['font_family'].', sans-serif; ';
	echo $this->Html->tag('span', $widget['title'], compact('style'));
