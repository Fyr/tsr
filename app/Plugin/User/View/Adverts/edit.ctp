<?
	$fullImgW = 550;
	$previewImgW = 150;
?>
<style type="text/css">
.previewAdsImage .tizer {
	width: 150px;
}
.previewAdsImage .tizer .title {
	font-size: 12px;
	margin: 5px 0;
}
.previewAdsImage .tizer .previewImg {
	background: #ccc;
	width: 150px;
	height: 150px;
	overflow: hidden;
}
.previewAdsImage .tizer .previewImg img {
	position: relative; left: 0px;
}

.previewAdsImage .tizer .description {
	padding-top: 0;
	text-align: justify;
}
.previewAdsImage .fullImage {
}
.previewAdsImage .fullImage, .previewAdsImage .fullImage img {
	width: <?=$fullImgW?>px;
}
</style>
<?
	$this->Html->css(array('jquery.Jcrop.min'), array('inline' => false));
	$this->Html->script(array(
		'vendor/jquery/jquery.ui.widget',
		'vendor/jquery/jquery.iframe-transport',
		'vendor/jquery/jquery.fileupload',
		'vendor/jquery/jquery.Jcrop.min',
		'/Core/js/json_handler'
	), array('inline' => false));
	
	$id = $this->request->data('Advert.id');
	$title = $this->ObjectType->getTitle(($id) ? 'edit' : 'create', 'Advert');
	
	$url = array(
		'campaigns' => array('controller' => 'Campaigns', 'action' => 'index'),
		'index' => array('controller' => 'Adverts', 'action' => 'index', $campaign['Campaign']['id'])
	);
	$aBreadCrumbs = array(
		array('label' => $this->ObjectType->getTitle('index', 'Campaign'), 'url' => $url['campaigns']),
		array('label' => $campaign['Campaign']['title']),
		array('label' => $this->ObjectType->getTitle('index', 'Advert'), 'url' => $url['index']),
		array('label' => $title)
	);
?>
<div class="clearfix">
	<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title))?>
	<?=$this->element('back', array('url' => $url['index']))?>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<?=$this->Form->create('Advert', array('class' => 'ls_form'))?>
		<?=$this->Form->hidden('AdvertMedia.crop', array('value' => ''))?>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label><?=__('Link')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('URL for your advert')?>"></i>
						<?=$this->Form->input('Advert.url', array('class' => 'form-control', 'label' => false, 'div' => false))?>
					</div>
					<div class="form-group clearfix">
						<label><?=__('Title')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('Title must be less then %s chars', Configure::read('Advert.maxTitleLen'))?>"></i>
<?
	if (!$id) {
		$this->request->data('Advert.title', 'Default advert title...');
		$this->request->data('Advert.descr', 'Default advert description...');
	}
	
?>
						<?=$this->Form->input('Advert.title', array('class' => 'form-control', 'label' => false, 'div' => false))?>
						<span id="AdvertTitleCharsLeft" class="small pull-right"></span>
					</div>
					<div class="form-group">
						<label><?=__('Description')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('Your description should be less then %s chars', Configure::read('Advert.maxDescrLen'))?>"></i>
						<?=$this->Form->input('Advert.descr', array('class' => 'form-control', 'label' => false, 'div' => false))?>
						<span id="AdvertDescrCharsLeft" class="small pull-right"></span>
					</div>
					<div class="form-group">
						<label><?=__('Image')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('Input image URL or browse from your local drive')?>"></i>
						<div class="row">
							<div class="col-sm-8">
								<div class="input-group">
									<?=$this->Form->input('Advert.img_url', array('class' => 'form-control', 'label' => false, 'div' => false, 'placeholder' => __('Image URL...')))?>
									<span class="input-group-btn">
										<button id="updateImageURL" class="btn btn-default" type="button"><i class="fa fa-refresh"></i></button>
									</span>
								</div>
								<div class="error-message" style="display: none;"><?=__('Incorrect image URL')?></div>
							</div>
							<div class="col-sm-4">
								<input id="advertImageChoose" class="fileuploader" type="file" data-object_type="Advert" data-object_id="<?=$id?>" data-progress_id="progress-Advert<?=$id?>" accept="image/*"/>
							</div>
						</div>
					</div>
					<div id="control-Category" class="form-group">
						<label><?=__('Category')?></label> <i class="fa fa-info-circle tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Описание"></i>
						<?=$this->Form->input('Advert.advert_category_id', array('options' => $aCategoryOptions, 'class' => 'form-control selectize', 'label' => false, 'div' => false))?>
					</div>
					<div id="control-Buttons" class="form-group clearfix">
						<button type="button" id="btnSave" class="btn ls-green-btn btn-lg pull-left"><?=__('Save')?></button>
						<!--button class="btn btn-primary btn-lg pull-right">Проверка правописания</button-->
                    </div>
                    <div id="control-Process" class="form-group clearfix" style="display: none;">
						<img src="/img/ajax_loader.gif" alt="" /> <?=__('Saving advert...')?>
                    </div>
				</div>
				<div class="col-sm-8 previewAdsImage clearfix">
					<div class="tizer">
						<div class="previewText"><?=__('Preview')?></div>
						<div class="previewImg">
<?
	if ($this->request->data('AdvertMedia.id')) {
		echo $this->Html->image($this->Media->imageUrl($this->request->data('AdvertMedia'), 'noresize'));
	} else {
		echo $this->Html->image('/img/widget_default_img.png', array('width' => 150));
	}
?>
						</div>
						<div class="title"></div>
						<div class="description"></div>
						<div class="category"></div>
					</div>
					<div class="fullImage">
						<div class="previewText"><?=__('Crop image')?></div>
						<img alt="" src="<?=$this->Media->imageUrl($this->request->data('AdvertMedia'), 'noresize')?>">
					</div>
				</div>
			</div>
		<?=$this->Form->end()?>
	</div>
</div>
<script type="text/javascript">
var tpl, maxTitleLen, maxDescrLen, fullImgW, previewImgW;
$(document).ready(function(){
	fullImgW = <?=$fullImgW?>;
	previewImgW = <?=$previewImgW?>;
	
	tpl = '<?=__('%s chars left')?>';
	maxTitleLen = <?=Configure::read('Advert.maxTitleLen')?>;
	maxDescrLen = <?=Configure::read('Advert.maxDescrLen')?>;
	
	$('#AdvertTitle').keyup(function(){
		updateCharsLeft('AdvertTitle', maxTitleLen);
		updatePreview();
	});
	
	$('#AdvertDescr').keyup(function(){
		updateCharsLeft('AdvertDescr', maxDescrLen);
		updatePreview();
	});
	
	$('#AdvertAdvertCategoryId').change(function(){
		updatePreview();
	});
	
	$('#AdvertImgUrl').focus(function(){
		$(this).select();
	});
	
	$('#updateImageURL').click(function(){
		checkImageURL(function(){ 
			$('#btnSave').data(false);
			jcrop_data = [];
			jcropInit($('#AdvertImgUrl').val()); 
		});
	});
	
	$('#AdvertImgUrl').change(function(){
		checkImageURL(function(){ 
			$('#btnSave').data(false);
			jcrop_data = [];
			jcropInit($('#AdvertImgUrl').val()); 
		});
	});
	
	updateCharsLeft('AdvertTitle', maxTitleLen);
	updateCharsLeft('AdvertDescr', maxDescrLen);
	updatePreview();
	
	$('#advertImageChoose').styler({fileBrowse: '<?=__('Browse')?>'});
	
	$('#btnSave').click(function(){
		checkImageURL(function(){
			$('#control-Buttons').hide();
			$('#control-Process').show();
			$('#advertImageChoose').hide();
			
			$('.error-message').remove();
			$('.form-error').removeClass('form-error');
			
			var imgData = $('#btnSave').data();
			var lUploadImage = imgData && Object.keys(imgData).length;
			
			if (jcrop_data.length && !lUploadImage) {
				$('#AdvertMediaCrop').val(jcrop_data.join(','));
			}
			var url = $('#AdvertEditForm').prop('action') + '.json';
			$.post(url, $('#AdvertEditForm').serialize(), function(response){
				if (checkJson(response)) {
					$('#advertImageChoose').data('object_id', response.data.id);
					if (lUploadImage) {
						imgData.submit();
					} else {
						window.location.href = mediaURL.redir;
					}
				} else {
					$('#control-Buttons').show();
					$('#control-Process').hide();
					$('#advertImageChoose').show();
					if (response.invalidFields) {
						for(var key in response.invalidFields) {
							var div = $('<div />').addClass('error-message').html(response.invalidFields[key][0]);
							$('input[name="data[Advert][' + key + ']"], textarea[name="data[Advert][' + key + ']"]').addClass('form-error').parent().append(div);
						}
					}
				}
			}, 'json');			
		});
	});
	
<?
	if ($this->request->data('AdvertMedia.id')) {
		$crop = $this->request->data('AdvertMedia.crop');
?>
	iW = fullImgW; 
	resizeAspect = fullImgW / <?=$this->request->data('AdvertMedia.orig_w')?>;
	iH = resizeAspect * <?=$this->request->data('AdvertMedia.orig_h')?>;
	
	var previewImg = $('.previewAdsImage .tizer img').get(0);
	$(previewImg).prop('width', iW);
	$(previewImg).prop('height', iH);
	
	crop = <?=json_encode($crop)?>;
	crop[0] = Math.round(crop[0] * resizeAspect);
	crop[1] = Math.round(crop[1] * resizeAspect);
	crop[2] = Math.round(crop[0] + crop[2] * resizeAspect);
	crop[3] = Math.round(crop[1] + crop[3] * resizeAspect);
	$('.previewAdsImage .fullImage img').Jcrop({
		aspectRatio: 1 / 1,
		bgOpacity: 0.5,
		setSelect: crop,
		minSize: [100, 100],
		onSelect: saveJcropData,
		onChange: saveJcropData
	}, function(){
	    jcrop_api = this;
	});
<?
	}
?>
});

function updateCharsLeft(id, maxLen) {
	var chars = $('#' + id).val().length;
	if (chars > maxLen) {
		$('#' + id).val($('#' + id).val().substr(0, maxLen));
		chars = maxLen;
	}
	$('#' + id + 'CharsLeft').html(tpl.replace(/\%s/, maxLen - chars));
}

function updatePreview() {
	$('.previewAdsImage .tizer .title').html($('#AdvertTitle').val());
	$('.previewAdsImage .tizer .description').html($('#AdvertDescr').val());
	$('.previewAdsImage .tizer .category').html($('#control-Category .selectize-input .item').html());
}

function checkImageURL(successFn, errorFn) {
	var url = $('#AdvertImgUrl').val();
	$('#AdvertImgUrl').removeClass('form-error');
	$('#AdvertImgUrl').parent().parent().find('.error-message').hide();
	
	if (!errorFn) {
		errorFn = function() {
			$('#AdvertImgUrl').addClass('form-error');
			$('#AdvertImgUrl').parent().parent().find('.error-message').show();
		}
	}
	if (url) {
		timeout = 5000;
		var timedOut = false, timer;
		var img = new Image();
		img.onerror = img.onabort = function() {
			if (!timedOut) {
				clearTimeout(timer);
				errorFn();
			}
		};
		img.onload = function() {
			if (!timedOut) {
				clearTimeout(timer);
				successFn();
			}
		};
		img.src = url;
		timer = setTimeout(function() {
			timedOut = true;
			// timeout for downloading image
			errorFn();
		}, timeout); 
	} else {
		successFn();
	}
}

var jcrop_api, jcrop_data = [], iW, iH, resizeAspect;
var mediaURL, advertData, advert_id;

$(function () {
	mediaURL = {
		upload: '<?=$this->Html->url(array('plugin' => 'media', 'controller' => 'ajax', 'action' => 'upload'))?>',
		move: '<?=$this->Html->url(array('plugin' => 'media', 'controller' => 'ajax', 'action' => 'move'))?>.json',
		redir: '<?=$this->Html->url($url['index'])?>'
	};
	$('.fileuploader').fileupload({
		url: mediaURL.upload,
		dataType: 'json',
		done: function (e, data) {
			var file = data.result.files[0];
			file.object_type = 'Advert';
			file.object_id = $('#advertImageChoose').data('object_id');
			file.crop = jcrop_data;
			
			$.post(mediaURL.move, file, function(response){
                if (checkJson(response)) {
                	window.location.href = mediaURL.redir;
                }
            }, 'json');
		},
		add: function (e, data) {
			if (e.isDefaultPrevented()) {
				return false;
			}
			$('#btnSave').data(data);
			jcropFromFile(data.files[0]);
		}
	}).prop('disabled', !$.support.fileInput)
		.parent().addClass($.support.fileInput ? undefined : 'disabled');
});

function jcropFromFile(file) {
	var oFReader = new FileReader();
	oFReader.readAsDataURL(file);

	oFReader.onload = function (oFREvent) {
		jcropInit(oFREvent.target.result);
	}
}

function jcropInit(src) {
	if (jcrop_api) {
		jcrop_api.destroy();
	}
	$('.previewAdsImage .fullImage img').remove();
	$('.previewAdsImage .fullImage').append('<img id="tempImg" src="" alt="" />');
	
	var img = $('img#tempImg').get(0);
	var previewImg = $('.previewAdsImage .tizer img').get(0);
	$(previewImg).hide().prop('src', src);
	$(img).hide().prop('src', src);
		
	var count = 0;
	var timer = setInterval(function(){
		iW = img.width, iH = img.height;
		if (count > 50) {
			alert('Your photo is too large. Please upload another one');
		}
		if (iW < 5) {
			count++;
			return;
		}
		clearInterval(timer);
		
		$(img).show();
	
   		resizeAspect = fullImgW / iW;
   		$(img).prop('width', iW = fullImgW);
   		$(img).prop('height', iH = iH * resizeAspect);
   		
   		$(previewImg).prop('width', iW);
   		$(previewImg).prop('height', iH);
		$(previewImg).show();
   		
   		var min = Math.min(iW, iH);
		$(img).Jcrop({
			aspectRatio: 1 / 1,
			bgOpacity: 0.5,
			setSelect: [ 20, 20, min - 20, min - 20],
			minSize: [100, 100],
			onSelect: saveJcropData,
    		onChange: saveJcropData
		}, function(){
		    jcrop_api = this;
		});
	}, 100);
}

function getFileType(file) {
	var type = file.type.replace(/application\//, '');
	if (type.length > 4) {
		var fname = file.name.split('.');
		if (fname.length > 1) {
			type = fname.pop();
		}
		if (type.length > 4) {
			type = '';
		}
	}
	return type;
}

function saveJcropData(c) {
	jcrop_data = [Math.floor(c.x / resizeAspect), Math.floor(c.y / resizeAspect), Math.floor(c.w / resizeAspect), Math.floor(c.h / resizeAspect)];
	
	var $previewImg = $('.previewAdsImage .tizer img');
	
	$previewImg.prop('width', nW = previewImgW * iW / c.w);
	$previewImg.prop('height', nH = previewImgW * iH / c.h);
	
	$previewImg.css('left', (-c.x * nW / iW) + 'px');
	$previewImg.css('top', (-c.y * nH / iH) + 'px');
};

</script>