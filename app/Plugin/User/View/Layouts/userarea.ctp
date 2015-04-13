<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <?=$this->Html->charset(); ?>
	<title><?=$title_for_layout; ?></title>
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- iOS webapp icons -->
    <link rel="apple-touch-icon-precomposed" href="/img/ios/fickle-logo-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/ios/fickle-logo-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ios/fickle-logo-114.png" />
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:800' rel='stylesheet' type='text/css'>

<?
	echo $this->Html->css(array(
		'bootstrap.min',
		'pace',
		'bootstrap-progressbar-3.1.1',
		'jquery-jvectormap',
		'selectize.bootstrap3',
		'jquery.minicolors',
		// 'jquery.datetimepicker',
		'bootstrap-datetimepicker',
		'style',
		'responsive',
		'font-awesome',
		'nanoscroller',
		'switchery.min',
		'bootstrap-switch',
		'tab'
	));
	
	echo $this->Html->script(array(
		'vendor/jquery/jquery-1.11.2.min', 
		'vendor/bootstrap/bootstrap.min',
		'vendor/bootstrap/bootstrap-switch',
		'vendor/bootstrap/bootstrap-progressbar.min',
		'vendor/bootstrap/bootstrap-datetimepicker.min',
		'pace.min',
		
		'vendor/jquery/jquery.cookie',
		'vendor/jquery/jquery.easing',
		'vendor/jquery/jquery.nanoscroller.min',
		'vendor/jquery/jquery.easypiechart.min',
		'vendor/jquery/jquery.datetimepicker',
		'vendor/jquery/jquery.toolbar.min',
		'vendor/jquery/jvectormap/jquery-jvectormap-1.2.2.min',
		'vendor/jquery/jvectormap/jquery-jvectormap-world-mill-en',
		
		'vendor/jquery/chart/flot/jquery.flot',
		'vendor/jquery/chart/flot/jquery.flot.pie',
		'vendor/jquery/chart/flot/jquery.flot.resize',
		
		'vendor/jquery/jquery.formstyler.min',
		
		'vendor/pages/layout',
		//'vendor/pages/dashboard',
		'vendor/pages/uiElements',
		
		//'vendor/countUp.min',
		'vendor/notify.min',
		'vendor/skycons',
		'vendor/color',
		'vendor/multipleAccordion',
		'vendor/switchery.min',
		'vendor/selectize.min',
		// 'vendor/tabulous',
		
		// для графиков
		'vendor/morris.min',
		'vendor/raphael-min',
	));
	
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>  
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
$(document).ready(function() {
	$('.selectize').selectize({create: false});
	
	$('.datepicker').datetimepicker({
		timepicker: false,
		datepicker:true,
		mask:'39/19/9999',
		format:'d/m/Y'
	});

	$('.fileBrowse').styler({fileBrowse: 'Upload image'});
	
	$('input[type=checkbox]').styler();
});

function setLang(lang) {
	$.cookie('lang', lang, {expires: 365, path: '/'});
	window.location.reload();
}
</script>
</head>
<body class="">

<div class="topHeader">
		<div class="container">
			<div class="header-logo">
				<a href="/" title=""><h1><?=Configure::read('domain.title')?></h1></a>
			</div>
			<ul class="topMenu">
			    <li><a href="#"><?=$currUser['User']['username']?></a></li>
			    <li>
<?
	if ($currLang == 'per') {
?>
			    	<a href="javascript:void(0)" class="not_active">PER</a> | <a href="javascript:void(0)" onclick="setLang('eng')">ENG</a>
<?
	} else {
?>
					<a href="javascript:void(0)" onclick="setLang('per')">PER</a> | <a class="not_active" href="javascript:void(0)">ENG</a>
<?
	}
?>
			    </li>
			    	
			    <li><?=$this->Html->link(__('Logout'), array('plugin' => '', 'controller' => 'Pages', 'action' => 'logout'))?></a></li>
			</ul>
		</div>
	</div>
	<?=$this->element('main_menu')?>
	<section id="main-container">
		<section id="min-wrapper">
			<div id="main-content">
				<div class="container">
					<?=$this->element('flash_message')?>
					<?=$this->fetch('content')?>
				</div>
			</div>
		</section>
	</section>
</body>
</html>