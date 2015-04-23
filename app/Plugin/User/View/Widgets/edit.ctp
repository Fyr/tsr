<?
	$this->Html->css('jquery.minicolors', array('inline' => false));
	$this->Html->script(array('vendor/jquery/jquery.minicolors.min', 'vendor/tmpl.min'), array('inline' => false));
	
	$id = $this->request->data('Widget.id');
	$title = $this->ObjectType->getTitle(($id) ? 'edit' : 'create', 'Widget');
	$url = array(
		'campaigns' => array('controller' => 'Campaigns', 'action' => 'index'),
		'index' => array('controller' => 'Widgets', 'action' => 'index', $campaign['Campaign']['id'])
	);
	$aBreadCrumbs = array(
		array('label' => $this->ObjectType->getTitle('index', 'Campaign'), 'url' => $url['campaigns']),
		array('label' => $campaign['Campaign']['title']),
		array('label' => $this->ObjectType->getTitle('index', 'Widget'), 'url' => $url['index']),
		array('label' => $title)
	);
	
	$collapsePanels = (!$id && !$this->request->data('Widget.title'));
	
	$defaults = array(
		'title' => 'Example Article Headline from the Creozo.com Network',
		'width' => '485',
		'rows' => 1,
		'cols' => 4,
		'bkg_color' => '#ffffff',
		'img' => '/img/widget_default_img.png',
		'image_size' => 100,
		'image_margin' => 10,
		// Text settings
		'font_size' => 12,
		'font_color' => '#000000',
		'font_weight' => 'normal',
		'font_family' => 'Arial',
		// Borders
		'border_outer_size' => 1,
		'border_outer_color' => '#dddddd',
		'border_img_size' => 1,
		'border_img_color' => '#dddddd',
	);
	if (!$id) {
		$this->request->data['Widget'] = Hash::merge($defaults, $this->request->data['Widget']);
	}
?>
<div class="clearfix">
	<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title))?>
	<?=$this->element('back', array('url' => $url['index']))?>
</div>
<?
	echo $this->Form->create('Widget', array(
		'class' => 'form-horizontal ls_form ls_form_horizontal',
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'col-sm-5 control-label', 'text' => ''),
			'class' => 'form-control',
			'between' => '<div class="col-sm-7">',
			'after' => '</div>',
			'error' => array('attributes' => array('wrap' => 'div', 'class' => 'error-message'))
		)
	));
	echo $this->Form->hidden('id');
	echo $this->Form->hidden('campaign_id');
?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-5">
					<ul class="nav nav-tabs nav-justified icon-tab">
						<li class="active"><a href="#home-two" data-toggle="tab"><?=__('Settings')?></a></li>
						<li><a href="#profile-two" data-toggle="tab"><?=__('Categories')?></a></li>
					</ul>
					<div class="tab-content tab-border">
						<div class="tab-pane fade in active" id="home-two">
							<div class="panel-group">
								<div class="panel panel-light-green">
									<div class="panel-heading"  data-target="#collapseOne" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
										<h4 class="panel-title"><i class="fa fa-caret-down"></i> <?=__('Widget settings')?></h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
<?
	echo $this->Form->input('title', array(
		'required' => false,
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Widget name'))
	));
	echo $this->Form->input('width', array(
		'label' => array(
			'class' => 'col-sm-5 control-label', 
			'text' => __('Widget width, px')
		)
	));
	/*
	echo $this->Form->input('inner_padding', array(
		'label' => array(
			'class' => 'col-sm-5 control-label', 
			'text' => __('Inner padding, px')
		)
	));
	*/
	echo $this->Form->input('rows', array(
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Number of rows'))
	));
	echo $this->Form->input('cols', array(
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Number of columns'))
	));
	echo $this->Form->input('bkg_color', array(
		'class' => 'form-control miniColors',
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Background color'))
	));
	
	$options = array(
		'class' => 'selectize',
		'options' => Configure::read('Widget.image_size_options'),
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Image size')),
	);
	echo $this->Form->input('image_size', $options);

	$options = array(
		'class' => 'selectize',
		'options' => Configure::read('Widget.image_pos_options'),
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Image position')),
	);
	echo $this->Form->input('image_pos', $options);
	
	echo $this->Form->input('image_margin', array(
		'label' => array(
			'class' => 'col-sm-5 control-label', 'text' => __('Image margin, px')
		)
	));
?>
										</div>
									</div>
								</div>
								<div id="panelTextSettings" class="panel panel-light-green">
									<div class="panel-heading"  data-target="#collapseTwo" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
										<h4 class="panel-title"><i class="fa fa-caret-down"></i> <?=__('Text settings')?></h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
<?
	echo $this->Form->input('font_size', array(
		'label' => array(
			'class' => 'col-sm-5 control-label', 
			'text' => __('Font size, px')
		)
	));
	
	echo $this->Form->input('font_color', array(
		'class' => 'form-control miniColors',
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Font color'))
	));
	
	$options = array(
		'class' => 'selectize',
		'options' => Configure::read('Widget.font_weight_options'),
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Font weight')),
	);
	echo $this->Form->input('font_weight', $options);
	
	$options = array(
		'class' => 'selectize',
		'options' => Configure::read('Widget.font_family_options'),
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Font family')),
	);
	echo $this->Form->input('font_family', $options);
?>
										</div>
									</div>
								</div>
								<div id="panelBorders" class="panel panel-light-green">
									<div class="panel-heading"  data-target="#collapseThree" data-toggle="collapse" aria-expanded="true" aria-controls="collapseThree">
										<h4 class="panel-title"><i class="fa fa-caret-down"></i> <?=__('Borders')?></h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
<?
	echo $this->Form->input('border_outer_size', array(
		'label' => array(
			'class' => 'col-sm-5 control-label', 
			'text' => __('Outer border size,px').$this->element('tooltip', array('title' => __('Input `zero` to disable outer border')))
		)
	));
	echo $this->Form->input('border_outer_color', array(
		'class' => 'form-control miniColors',
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Outer border color'))
	));
	echo $this->Form->input('border_img_size', array(
		'label' => array(
			'class' => 'col-sm-5 control-label', 
			'text' => __('Image border size,px').$this->element('tooltip', array('title' => __('Input `zero` to disable image border')))
		)
	));
	echo $this->Form->input('border_img_color', array(
		'class' => 'form-control miniColors',
		'label' => array('class' => 'col-sm-5 control-label', 'text' => __('Image border color'))
	));
?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="profile-two">
							<div class="panel panel-dark">
								<div class="panel-heading">
									<h3 class="panel-title">Categories</h3>
								</div>
								<div class="panel-body">
									<!--label><input type="checkbox" id="checkAll" /> Select all</label><br /><br /-->
									<div class="categoriesList clearfix">
<?
	$i = 0;
	foreach($aCategoryOptions as $cat_id => $title) {
		$checked = (in_array($cat_id, $widgetsByCat) || !$id) ? 'checked="checked"' : '';
?>
											<label><input type="checkbox" name="data[WidgetByCategory][category_id][]" value="<?=$cat_id?>" <?=$checked?> /> <div class="cat-title"> <?=$title?></div></label>
<?
		$i++;
	}
?>
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-7 previewWidget"></div>
			</div>
			
		</div>
	</div>
	<button type="submit" class="btn ls-green-btn btn-lg"><?=__('Save')?></button><br /><br />
<?=$this->Form->end()?>

<script type="text/javascript">
$(document).ready(function(){
	$('.error-message').each(function(){
		var html = $(this).html();
		$(this).parent().find('.col-sm-7').append(this);
	});
	
<?
	if ($collapsePanels) {
?>
	$('#panelTextSettings h4, #panelBorders h4').click();
<?
	}
?>

	$('.miniColors').minicolors({
    	animationSpeed: 50,
    	animationEasing: 'swing',
		change: null,
		changeDelay: 0,
		control: 'hue',
		defaultValue: $defultColor,
		hide: null,
		hideSpeed: 100,
		inline: false,
		letterCase: 'lowercase',
		opacity: true,
		position: 'bottom left',
		show: null,
		showSpeed: 100,
		theme: 'bootstrap'
	});
	
	$('#checkAll').change(function(){
		$('.categoriesList input').prop('checked', $('#checkAll').prop('checked'));
	});
	
	$('#WidgetTitle, #WidgetRows, #WidgetCols, #WidgetBorderOuterSize, #WidgetBorderImgSize, #WidgetImageMargin, #WidgetWidth, #WidgetFontSize').keyup(function(e){
		e.stopPropagation();
		updatePreviewWidget();
	});
	$('#WidgetImageSize, #WidgetImagePos, #WidgetBorderOuterColor, #WidgetBorderImgColor, #WidgetBkgColor, #WidgetFontColor, #WidgetFontWeight, #WidgetFontFamily').change(function(e){
		e.stopPropagation();
		updatePreviewWidget();
	});
	
	updatePreviewWidget();
});

function updatePreviewWidget() {
	var re = /^[0-9]+$/;
	if (re.test($('#WidgetRows').val()) && re.test($('#WidgetCols').val()) && re.test($('#WidgetBorderOuterSize').val())
		&& re.test($('#WidgetImageMargin').val()) && re.test($('#WidgetWidth').val()) && re.test($('#WidgetFontSize').val())) {
		$('.previewWidget').html(tmpl('preview-widget'));
	}
}
</script>
<script type="text/x-tmpl" id="preview-widget">
{%
	var style = 'display: block; overflow: hidden;';
	style+= 'background: ' + $('#WidgetBkgColor').val() + '; ';
	style+= 'width: ' + $('#WidgetWidth').val() + 'px; ';
	if ($('#WidgetBorderOuterSize').val()) {
		style+= 'border: ' + $('#WidgetBorderOuterSize').val() + 'px solid ' + $('#WidgetBorderOuterColor').val();
	}
	
%}
<div class="clearfix" style="{%=style%}">
{%
	for(var i = 0; i < $('#WidgetRows').val(); i++) {
%}
	<div class="clearfix">
{%
		for(var j = 0; j < $('#WidgetCols').val(); j++) {
%}
		<div class="item" style="width: {%=$('#WidgetImageSize').val()%}px; margin: {%=$('#WidgetImageMargin').val()%}px">
{%
			if ($('#WidgetImagePos').val() == 'above') {
				include('preview-img', {});
				include('preview-text', {});
			} else if ($('#WidgetImagePos').val() == 'behind') {
				include('preview-text', {});
				include('preview-img', {});
			}
%}
		</div>
{%
		}
%}
	</div>
{%
	}
%}
</div>
</script>

<script type="text/x-tmpl" id="preview-img">
{%
	var style = 'width: ' + $('#WidgetImageSize').val() + 'px; ';
	if ($('#WidgetBorderImgSize').val()) {
		style+= 'border: ' + $('#WidgetBorderImgSize').val() + 'px solid ' + $('#WidgetBorderImgColor').val();
	}
%}
<a href="javascript:void(0)">
<img style="{%=style%}" src="<?=$defaults['img']?>">
</a>
</script>

<script type="text/x-tmpl" id="preview-text">
{%
	var style = 'font-size: ' + $('#WidgetFontSize').val() + 'px; ';
	style+= 'color: ' + $('#WidgetFontColor').val() + '; ';
	style+= 'font-weight: ' + $('#WidgetFontWeight').val() + '; ';
	style+= 'font-family: ' + $('#WidgetFontFamily').val() + ', sans-serif; ';
%}
<a href="javascript:void(0)">
<span style="{%=style%}">{%=$('#WidgetTitle').val()%}</span>
</a>
</script>