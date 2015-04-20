<?
if ($widget = $widget['Widget']) {
	$html = '<div style="display: inline-block; background: '.$widget['bkg_color'].'; padding: '.$widget['inner_padding'].'px; border: '.$widget['border_outer_size'].'px solid '.$widget['border_outer_color'].'">';
	for($i = 0; $i < $widget['rows']; $i++) {
		$html.= '<div style="clear: both;">'; // content: \' \'; display: table; 
		for($j = 0; $j < $widget['cols']; $j++) {
			$html.= '<div class="item" style="float: left; width: '.$widget['image_size'].'px; margin: '.$widget['image_margin'].'px">';
			if ($widget['image_pos'] == 'above') {
				$html.= $this->element('Widget/render_img', compact('widget'));
				$html.= $this->element('Widget/render_text', compact('widget'));
			} elseif ($widget['image_pos'] == 'behind') {
				$html.= $this->element('Widget/render_text', compact('widget'));
				$html.= $this->element('Widget/render_img', compact('widget'));
			}
			$html.= '</div>';
		}
		$html.= '</div>';
	}
	$html.= '</div>';
} else {
	$html = 'Invalid widget code';
}
echo 'document.write(\''.$html.'\')';