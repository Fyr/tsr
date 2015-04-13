<?
	$title = array();
	foreach(array('index', 'create', 'edit', 'stats') as $action) {
		$title[$action] = $this->ObjectType->getTitle($action, 'Informer');
	}
	$url = array(
		'create' => array('controller' => 'Informers', 'action' => 'edit', 0, $campaign['Campaign']['id']),
		'campaigns' => array('controller' => 'Campaigns', 'action' => 'index')
	);
	$aBreadCrumbs = array(
		array('label' => $this->ObjectType->getTitle('index', 'Campaign'), 'url' => $url['campaigns']),
		array('label' => $campaign['Campaign']['domain']),
		array('label' => $title['index'])
	);
?>
<div class="row">
	<div class="col-sm-12 mainFilter">
		<div class="clearfix">
			<?=$this->element('bread_crumbs', compact('aBreadCrumbs'))?>
        	<?=$this->element('title', array('class' => 'pull-left', 'title' => $title['index']))?>
        	<?=$this->element('back', array('url' => $url['campaigns']))?>
		</div>
		<div class="panel panel-dark">
            <div class="panel-body clearfix">
            	<form action="" method="get">
				<a href="<?=$this->Html->url($url['create'])?>" class="btn ls-green-btn btn-lg pull-left"><i class="fa fa-plus-circle"></i> <?=$title['create']?></a>
				<span class="filerText"><?=__('Filter by')?></span>
<?
	$aStatusOptions = array_merge(array(0 => '- '.__('Any status').' -'), $aStatusOptions);
	$options = array(
		'class' => 'selectize', 
		'options' => $aStatusOptions, 
		'label' => false, 
		'div' => false, 
		'value' => $this->request->query('data.status')
	);
?>
					<?=$this->Form->input('status', $options)?>
				<!--div class="dateBlock">
					<label><?=__('Creation date')?></label>
					<?=$this->Form->input('created', array('class' => 'form-control datePickerOnly', 'div' => false, 'label' => false))?>
				</div-->
				<button type="submit" class="btn btn-success apply"><?=__('Apply')?></button>
				<button class="btn btn-default export"><?=__('Export')?></button>
				</form>
            </div>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive ls-table">
		<table class="table table-bordered table-striped advertList">
			<thead>
				<tr>
					<th width="3%"><input type="checkbox" /></th>
					<th width="15%">Title / ID</th>
					<th width="30%">Status</th>
					<th width="15%">Shows <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="15%">Clicks <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="7%">CTR <i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i></th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
<?
	foreach($aInformers as $row) {
		$id = $row['Informer']['id'];
		$status = $aStatusOptions[$row['Informer']['status']];
?>
					<td><input type="checkbox" /></td>
					<td>
						<?=$row['Informer']['title']?> <br />
						<?=$id?>
						<!--i class="fa fa-info-circle pull-right tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip on top"></i-->
					</td>
					<td class="clearfix">
						<?=$status?>
					</td>
					<td class="text-right">
						0
					</td>
					<td class="text-right">
						0
					</td>
					<td class="text-right">0,000</td>
					<td class="text-center">
						<a href="<?=$this->Html->url(array('controller' => 'Informers', 'action' => 'stats', $id))?>" class="btn btn-xs btn-warning tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['stats']?>"><i class="fa fa-bar-chart-o"></i></a>
						<a href="<?=$this->Html->url(array('controller' => 'Informers', 'action' => 'edit', $id))?>" class="btn btn-xs btn-info tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=$title['edit']?>"><i class="fa fa-wrench"></i></a>
						<a href="<?=$this->Html->url(array('controller' => 'Informers', 'action' => 'delete', $id))?>" class="btn btn-xs btn-danger tooltipLink" data-placement="top" data-toggle="tooltip" data-original-title="<?=__('Delete')?>"><i class="fa fa-times"></i></a>
						<br />
						<br />
						<a data-target="#getCode" data-toggle="modal" href="javascript: void(0)"><?=__('Show code')?></a>
					</td>
				</tr>
<?
	}
?>
			</tbody>
		</table>
		</div>
	</div>
</div>

<div class="modal fade" id="getCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header label-success white">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Это код вашего информера. Просто скопируйте и вставьте его в место на странице, где должен отображаться рекламный блок. </h4>
			</div>
			<div class="modal-body">
				<textarea class="form-control" style="height:300px">
					<!-- LentaInformNews Start -->
<div id="LentaInformScriptRootN14617" class="news-block-magick"><br />
<div id="LentaInformPreloadN14617">
<a href="http://lentainform.com/" target="_blank">Загрузка...</a>    
</div>
    <script>
                        (function(){
            var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
            var i=d[ce]('iframe');i[st][ds]=n;d[gi]("LentaInformScriptRootN14617")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
            catch(e){var iw=d;var c=d[gi]("LentaInformScriptRootN14617");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=14617;c[ac](dv);
            var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsn.lentainform.com/b/e/belaruspartisan.org.14617.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
    </script>
</div>
<!-- LentaInformNews End --> 

				</textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>