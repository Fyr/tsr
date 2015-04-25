<?
if ($widget = $widget['Widget']) {
	$style = array(
		'display' => 'block',
		'background' => $widget['bkg_color'],
		'border' => $widget['border_outer_size'].'px solid '.$widget['border_outer_color'],
		'width' => $widget['width'].'px'
	);
	$html = '<div style="'.$this->Html->style($style).'">';
	/*
	var style = '';
	if ($.inArray($('#WidgetImagePos').val(), ['above', 'behind']) >= 0) {
		style = 'width: ' + $('#WidgetImageSize').val() + 'px; margin: ' + $('#WidgetImageMargin').val() + 'px';
	} else {
		var w = Math.floor($('#WidgetWidth').val() / $('#WidgetCols').val() - $('#WidgetBorderImgSize').val());
		style = 'width: ' + w + 'px; padding: ' + $('#WidgetImageMargin').val() + 'px; ';
	}
	*/
	$style = array('float' => 'left');
	if (in_array($widget['image_pos'], array('above', 'behind'))) {
		$style['width'] = $widget['image_size'].'px';
		$style['margin'] = $widget['image_margin'].'px';
	} else {
		$style['width'] = floor($widget['width'] / $widget['cols'] - $widget['image_margin'] * 2 - 1).'px';
		$style['margin'] = $widget['image_margin'].'px';
	}
	for($i = 0; $i < $widget['rows']; $i++) {
		$html.= '<div>'; // content: \' \'; display: table; 
		for($j = 0; $j < $widget['cols']; $j++) {
			
			$html.= '<div style="'.$this->Html->style($style).'">';
			if ($widget['image_pos'] == 'above') {
				$html.= $this->element('Widget/render_img', compact('widget'));
				$html.= $this->element('Widget/render_text', compact('widget'));
			} elseif ($widget['image_pos'] == 'behind') {
				$html.= $this->element('Widget/render_text', compact('widget'));
				$html.= $this->element('Widget/render_img', compact('widget'));
			} else {
				$html.= $this->element('Widget/render_img', compact('widget'));
				$html.= $this->element('Widget/render_text', compact('widget'));
			}
			$html.= '</div>';
		}
		$html.= '<div style="clear: both;"></div>';
		$html.= '</div>';
	}
	$html.= '</div>';
} else {
	$html = 'Invalid widget code';
}
// echo 'document.write(\''.$html.'\')';
echo 'document.getElementById("creozo-com-widget-'.$widget['id'].'").innerHTML = \''.$html.'\'';