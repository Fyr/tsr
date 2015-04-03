<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
	<meta charset="utf-8">
	<?=$this->Html->charset()?>
	<title><?=$title_for_layout?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'> 
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,800,600' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<?
	echo $this->Html->meta('icon');

	echo $this->Html->css(array('bootstrap.min', 'font-awesome', 'flexslider', 'styles'));
	
	$aScripts = array(
		'vendor/jquery/jquery-1.11.2.min',
		'vendor/jquery/jquery-migrate-1.2.1.min',
		'vendor/jquery/jquery.placeholder',
		'vendor/jquery/jquery.fitvids',
		'vendor/jquery/jquery.flexslider-min',
		'vendor/bootstrap/bootstrap.min',
		'vendor/bootstrap/bootstrap-hover-dropdown.min',
		'back-to-top',
		'tabs',
		'main',
		'sitescript'
	);
	echo $this->Html->script($aScripts);

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>
</head> 

<body class="home-page">   
    <?=$this->element('SiteUI/main_menu')?>
	<?=$this->fetch('content')?>
    <?=$this->element('SiteUI/footer')?>
</body>
</html> 

