<?
	$this->Html->css('jquery.minicolors', array('inline' => false));
	$this->Html->script('vendor/jquery/jquery.minicolors.min', array('inline' => false));
	
	$id = $this->request->data('Informer.id');
	$title = $this->ObjectType->getTitle(($id) ? 'edit' : 'create', 'Informer');
	$url = array(
		'campaigns' => array('controller' => 'Campaigns', 'action' => 'index'),
		'index' => array('controller' => 'Informers', 'action' => 'index', $campaign['Campaign']['id'])
	);
	$aBreadCrumbs = array(
		array('label' => $this->ObjectType->getTitle('index', 'Campaign'), 'url' => $url['campaigns']),
		array('label' => $campaign['Campaign']['domain']),
		array('label' => $this->ObjectType->getTitle('index', 'Informer'), 'url' => $url['index']),
		array('label' => $title)
	);
?>
<div class="clearfix">
	<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title))?>
	<?=$this->element('back', array('url' => $url['index']))?>
</div>
<?=$this->Form->create('Informer', array('class' => 'form-horizontal ls_form ls_form_horizontal'))?>
	<?=$this->Form->hidden('id')?>
	<?=$this->Form->hidden('campaign_id')?>
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
											<div class="form-group">
												<label class="col-sm-5 control-label"><?=__('Widget name')?></label>
												<div class="col-sm-7">
													<?=$this->Form->input('title', array('class' => 'form-control', 'label' => false, 'div' => false))?>
													<!--input type="text" name="" class="form-control" value="First Widget" /-->
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Width <i data-original-title="Tooltip on top" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
												<div class="col-sm-7">
													<select class="selectize" placeholder="">
														<option value="1">200</option>
														<option value="2">300</option>
														<option value="3">400</option>
														<option value="4">500</option>
														<option value="5">600</option>
														<option value="6">700</option>
														<option value="7">800</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Number of Rows <i data-original-title="Tooltip on top" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
												<div class="col-sm-7">
													<input type="text" name="" class="form-control" value="1" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Number of Colomns</label>
												<div class="col-sm-7">
													<input type="text" name="" class="form-control" value="4" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Image Size <i data-original-title="Tooltip on top" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
												<div class="col-sm-7">
													<select class="selectize" placeholder="">
														<option value="1">100</option>
														<option value="2">140</option>
														<option value="3">180</option>
														<option value="4">200</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Image Location</label>
												<div class="col-sm-7">
													<select class="selectize" placeholder="">
														<option value="1">above</option>
														<option value="2">left</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Number of Colomns</label>
												<div class="col-sm-7">
													<input class="form-control miniColors" type="text"/>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-light-green">
									<div class="panel-heading collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo" data-target="#collapseTwo">
										<h4 class="panel-title"><i class="fa fa-caret-down"></i> <?=__('Text settings')?></h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											<div class="form-group">
										<label class="col-sm-5 control-label">Number of Colomns <i data-original-title="Tooltip on top" data-toggle="tooltip" data-placement="top" class="fa fa-info-circle pull-right tooltipLink"></i></label>
										<div class="col-sm-7">
											<input type="number" name="" class="form-control" min="8" max="26">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-5 control-label">Font color</label>
										<div class="col-sm-7">
											<input class="form-control miniColors" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-5 control-label">Font family</label>
										<div class="col-sm-7">
											<select class="selectize" placeholder="">
												<option value="1">Font1</option>
												<option value="2">Font2</option>
												<option value="3">Font3</option>
												<option value="4">Font4</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-5 control-label">Font Weight</label>
										<div class="col-sm-7">
											<select class="selectize" placeholder="">
												<option value="1">Bold</option>
												<option value="2">Normal</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-5 control-label">Decoration</label>
										<div class="col-sm-7">
											<select class="selectize" placeholder="">
												<option value="1">None</option>
												<option value="2">Underline</option>
											</select>
										</div>
									</div>
										</div>
									</div>
								</div>
								<div class="panel panel-light-green">
									<div class="panel-heading collapsed" data-target="#collapseThree" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
										<h4 class="panel-title"><i class="fa fa fa-caret-down"></i> <?=__('Borders')?></h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
											<div class="form-group">
												<label class="col-sm-5 control-label">Outer Border</label>
												<div class="col-sm-7">
													<input type="number" name="" class="form-control" min="0" max="10" value="0" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Outer Border Color</label>
												<div class="col-sm-7">
													<input class="form-control miniColors" type="text"/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Image Border</label>
												<div class="col-sm-7">
													<input type="number" name="" class="form-control" min="0" max="10" value="0" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-5 control-label">Image Border Color</label>
												<div class="col-sm-7">
													<input class="form-control miniColors" type="text"/>
												</div>
											</div>
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
									<label><input type="checkbox" /> Select all</label><br /><br />
									<div class="categoriesList clearfix">	
											<label><input type="checkbox" /> Auto</label>
											<label><input type="checkbox" /> Video Games</label>
											<label><input type="checkbox" /> Movies</label>
											<label><input type="checkbox" /> Entertainment News</label>
										
											<label><input type="checkbox" /> Men's Lifestyle</label>
											<label><input type="checkbox" /> Food and Drink</label>
											<label><input type="checkbox" /> Sports</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-7">
					<div class="previewWidget clearfix" style="background: #fff; border: 2px solid black">
						<div class="item" style="width: 23%; margin-left: 2%;">
							<img src="https://imgn.marketgid.com/200x200/3397/3397561_origin.jpg" style="border: 2px solid #000" />
							Example Article Headline from the ZergNet.com Network
						</div>
						<div class="item" style="width: 23%; margin-left: 1.5%;">
							<img src="https://imgn.marketgid.com/200x200/3397/3397561_origin.jpg" style="border: 2px solid #000" />
							Example Article Headline from the ZergNet.com Network
						</div>
						<div class="item" style="width: 23%; margin-left: 1.5%;">
							<img src="https://imgn.marketgid.com/200x200/3397/3397561_origin.jpg" style="border: 2px solid #000" />
							Example Article Headline from the ZergNet.com Network
						</div>
						<div class="item" style="width: 23%; margin-left: 1.5%;">
							<img src="https://imgn.marketgid.com/200x200/3397/3397561_origin.jpg" style="border: 2px solid #000" />
							Example Article Headline from the ZergNet.com Network
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<button type="submit" class="btn ls-green-btn btn-lg"><?=__('Save')?></button><br /><br />
<?=$this->Form->end()?>

<script type="text/javascript">
$(document).ready(function(){
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
});
</script>