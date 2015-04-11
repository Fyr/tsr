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
		'rtl-css/bootstrap-rtl',
		'rtl-css/style-rtl',
		'rtl-css/responsive-rtl',
		'rtl-css/pace-rtl',
		'rtl-css/bootstrap-progressbar-3.1.1-rtl',
		'rtl-css/jquery-jvectormap-rtl',
		'rtl-css/font-awesome-rtl',

		'rtl-css/jquery.amaran-rtl',
		'rtl-css/plugins/amaranjs/theme/all-themes-rtl',
		'rtl-css/plugins/amaranjs/theme/awesome-rtl',
		'rtl-css/plugins/amaranjs/theme/default-rtl',
		'rtl-css/plugins/amaranjs/theme/blur-rtl',
		'rtl-css/plugins/amaranjs/theme/user-rtl',
		'rtl-css/plugins/amaranjs/theme/rounded-rtl',
		'rtl-css/plugins/amaranjs/theme/readmore-rtl',
		'rtl-css/plugins/amaranjs/theme/metro-rtl'
	));
	
	echo $this->Html->script(array(
		'vendor/jquery/jquery-1.11.2.min', 
		'vendor/bootstrap/bootstrap.min',
		'vendor/bootstrap/bootstrap-switch',
		'vendor/bootstrap/bootstrap-progressbar.min',
		'pace.min',
		
		'vendor/jquery/jquery.easing',
		'vendor/jquery/jquery.nanoscroller.min',
		'vendor/jquery/jquery.easypiechart.min',
		
		'vendor/jquery/jvectormap/jquery-jvectormap-1.2.2.min',
		'vendor/jquery/jvectormap/jquery-jvectormap-world-mill-en',
		
		'vendor/jquery/chart/flot/jquery.flot',
		'vendor/jquery/chart/flot/jquery.flot.pie',
		'vendor/jquery/chart/flot/jquery.flot.resize',
		
		'vendor/jquery/jquery.amaran',
		
		'vendor/pages/layout',
		'vendor/pages/dashboard',
		
		'vendor/countUp.min',
		'vendor/skycons',
		'vendor/color',
		'vendor/multipleAccordion',
		'vendor/switchery.min',
	));
?>  


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="">
<!--Navigation Top Bar Start-->
<nav class="navigation">
<div class="container-fluid">
<!--Logo text start-->
<div class="header-logo">
    <a href="index.html" title="">
        <h1>Creozo</h1>
    </a>
</div>
<!--Logo text End-->
<div class="top-navigation">
<!--Collapse navigation menu icon start -->

<!--Collapse navigation menu icon end -->
<!--Top Navigation Start-->
<ul class="top_menu">
    <li><a href="#"><?=$currUser['User']['username']?></a></li>
    <li><a href="#" class="not_active">PER</a> | <a href="#">ENG</a></li>
    <li><?=$this->Html->link(__('Logout'), array('controller' => 'Pages', 'action' => 'logout'))?></a></li>
</ul>

<!--Top Navigation End-->
</div>
</div>
</nav>
<!--Navigation Top Bar End-->

<!--Navigation Top Bar Start-->
<nav class="navigation navigation2">


<div class="top-navigation top-navigation2">
<!--Collapse navigation menu icon start -->

<!--Collapse navigation menu icon end -->
<!--Top Navigation Start-->

<ul>
	     
    <li><a href="#">Adverts</a></li>
    <li><a href="#">Dashboard</a></li>  
    <li><a href="#">Widgets</a></li> 
    
    <li class="dropdown full-width2">
        <!--All task drop down start-->
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
          Moderator
        </a>
        <div class="dropdown-menu right top-dropDown-1">
           
            <ul>
                <li><a href="#">Sites</a></li>       
                 <li><a href="#">Statistics</a></li>    
                  <li><a href="#">Ads</a></li>      
                   <li><a href="#">Users</a></li>      
                    <li><a href="#">Landing</a></li>
                
                    
            </ul>
        </div>
        <!--All task drop down end-->
    </li>
    <li class="dropdown full-width2">
        <!--All task drop down start-->
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
          Editor
        </a>
        <div class="dropdown-menu right top-dropDown-1">
           
            <ul>
                <li><a href="#">Sites</a></li>       
                 <li><a href="#">Statistics</a></li>    
                  <li><a href="#">Ads</a></li>      
                   <li><a href="#">Users</a></li>      
                    <li><a href="#">Landing</a></li>
                
                    
            </ul>
        </div>
        <!--All task drop down end-->
    </li>
    <li class="dropdown full-width2">
        <!--All task drop down start-->
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
           Admin 
        </a>
        <div class="dropdown-menu right top-dropDown-1">
           
            <ul>
                <li><a href="#">Sites</a></li>       
                 <li><a href="#">Statistics</a></li>    
                  <li><a href="#">Ads</a></li>      
                   <li><a href="#">Users</a></li>      
                    <li><a href="#">Landing</a></li>
                
                    
            </ul>
        </div>
        <!--All task drop down end-->
    </li>
</ul>


<!--Top Navigation End-->
</div>
</div>
</nav>
<!--Navigation Top Bar End-->


<section id="main-container">




<!--Page main section start-->
<section id="min-wrapper">
<div id="main-content">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <!--Top header start-->
        <h3 class="ls-top-header">Dashboard</h3>
        <!--Top header end -->

        <!--Top breadcrumb start -->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="active">Dashboard</li>
        </ol>
        <!--Top breadcrumb start -->
    </div>
</div>
<!-- Main Content Element  Start-->
<div class="row">
    <div class="col-md-9">
        <div class="memberBox">
            <div class="memberBox-header">
                <h5>Logged In Member</h5>
            </div>
            <div id="realTimeChart" class="flotChartRealTime widgetRealTime">

            </div>
            <div class="memberBox-details">
                <ul>
                    <li>
                        <div class="memberBox-title">
                            <i class="fa fa-users"></i>
                            <h4>Member</h4>
                        </div>
                        <div class="memberBox-value up"><i class="fa fa-user"></i> <span>4250</span></div>
                    </li>
                    <li>
                        <div class="memberBox-title">
                            <i class="fa fa-eye"></i>
                            <h4>Visitor</h4>
                        </div>
                        <div class="memberBox-value down"><i class="fa fa-flag"></i> <span>9050</span></div>
                    </li>
                    <li>
                        <div class="memberBox-title">
                            <i class="fa fa-shopping-cart"></i>
                            <h4>Sales</h4>
                        </div>
                        <div class="memberBox-value up"><i class="fa  fa-money"></i> <span>50250</span></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="current-status-widget">
            <ul>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-light-green white">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="sale-view">2129</h5>
                        <p class="lightGreen"><i class="fa fa-arrow-up lightGreen"></i> Total sold</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-red white">
                            <i class="fa fa-download"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="download-show">5340</h5>
                        <p class="light-blue"><i class="fa fa-arrow-down light-blue"></i> Total download</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-lightBlue white">
                            <i class="fa fa-truck"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="deliver-show">10490</h5>
                        <p class="light-blue"><i class="fa fa-arrow-up light-blue"></i> Product delivered</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-light-green white">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="user-show">132129</h5>
                        <p class="lightGreen"><i class="fa fa-arrow-up lightGreen"></i> Total users</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-success white">
                            <i class="fa fa-github"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="product-up">29</h5>
                        <p class="text-success"><i class="fa fa-arrow-up text-success"></i> Uploaded project</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="status-box">
                        <div class="status-box-icon label-light-green white">
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>
                    <div class="status-box-content">
                        <h5 id="income-show">10299 </h5>
                        <p class="lightGreen"><i class="fa fa-arrow-up lightGreen"></i> Total income</p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
        </div>

    </div>
</div>

<div class="row home-row-top">
    <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
        <div class="pie-widget">
            <div id="pie-widget-1" class="chart-pie-widget" data-percent="73">
                <span class="pie-widget-count-1 pie-widget-count"></span>
            </div>
            <p>
                New Projects
            </p>
            <h5><i class="fa fa-bomb"></i> 240 </h5>

        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
        <div class="pie-widget">
            <div id="pie-widget-2" class="chart-pie-widget" data-percent="93">
                <span class="pie-widget-count-2 pie-widget-count"></span>
            </div>
            <p>
                New Users
            </p>
            <h5><i class="fa fa-child"></i> 1240 </h5>

        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
        <div class="pie-widget">
            <div id="pie-widget-3" class="chart-pie-widget" data-percent="23">
                <span class="pie-widget-count-3 pie-widget-count"></span>
            </div>
            <p>
                Total income
            </p>
            <h5><i class="fa fa-dollar"></i> 120,040.35 </h5>

        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
        <div class="pie-widget">
            <div id="pie-widget-4" class="chart-pie-widget" data-percent="33">
                <span class="pie-widget-count-4 pie-widget-count"></span>
            </div>
            <p>
                Sale reports
            </p>
            <h5><i class="fa fa-file-excel-o"></i> 40</h5>

        </div>
    </div>
</div>

<div class="row home-row-top">
    <div class="col-md-6">
        <div class="sale-widget">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs icon-tab icon-tab-home nav-justified">


                <li><a href="#monthly" data-toggle="tab"><i class="fa fa-calendar-o"></i> <span>Monthly</span></a></li>
                <li class="active"><a href="#yearly" data-toggle="tab"><i class="fa fa-dollar"></i> <span>Yearly</span></a></li>
                <li><a href="#product" data-toggle="tab" data-identifier="heroDonut"><i class="fa fa-shopping-cart"></i> <span>Product</span></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade" id="monthly">
                    <h4>Monthly Sales Report</h4>
                    <p>In 6 month</p>
                    <div class="monthlySale">
                        <ul>
                            <li>
                                <div class="progress vertical bottom">
                                    <div class="progress-bar ls-light-blue-progress six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="25"></div>
                                </div>
                                <div class="monthName">
                                    Jan
                                </div>
                            </li>
                            <li>
                                <div class="progress vertical bottom">
                                    <div class="progress-bar progress-bar-info six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="40"></div>
                                </div>
                                <div class="monthName">
                                    Feb
                                </div>
                            </li>
                            <li>
                                <div class="progress vertical bottom">
                                    <div class="progress-bar progress-bar-success six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="60"></div>
                                </div>
                                <div class="monthName">
                                    Mar
                                </div>
                            </li>
                            <li>
                                <div class="progress vertical bottom">
                                    <div class="progress-bar progress-bar-warning six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="80"></div>
                                </div>
                                <div class="monthName">
                                    Apr
                                </div>
                            </li>
                            <li>
                                <div class="progress vertical bottom">
                                    <div class="progress-bar progress-bar-danger six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="95"></div>
                                </div>
                                <div class="monthName">
                                    May
                                </div>
                            </li>
                            <li>
                                <div class="progress vertical bottom">
                                    <div class="progress-bar  six-sec-ease-in-out" role="progressbar" aria-valuetransitiongoal="15"></div>
                                </div>
                                <div class="monthName">
                                    Jun
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>


                <div class="tab-pane fade in active" id="yearly">
                    <div id="seriesToggleWidget" class="seriesToggleWidget"></div>
                    <ul id="choicesWidget"></ul>
                </div>
                <div class="tab-pane fade" id="product">
                    <div id="flotPieChart" class="flotPieChartWidget"></div>
                </div>

            </div>
            <!-- Tab End -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="v-map-widget">
            <div class="v-map-overlay">
                <ul>
                    <li><span class="user-status is-online"></span> Online</li>
                    <li><span class="user-status is-idle"></span> Idle</li>
                    <li><span class="user-status is-busy"></span> Busy</li>
                    <li><span class="user-status is-offline"></span> Offline</li>
                </ul>
            </div>
            <h3 class="ls-header">User Status</h3>
            <div id="world_map" class="world_map_home_widget">

            </div>
        </div>
    </div>

</div>
<div class="row home-row-top">
    <div class="col-md-12">
        <!--Table Wrapper Start-->
        <div class="table-responsive ls-table">
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Info</th>
                    <th>Progress</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>PSD Design</td>
                    <td>Lorem ipsum dolor sit amet</td>
                    <td class="ls-table-progress">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuetransitiongoal="50"></div>
                        </div>
                    </td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                        <button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-xs ls-light-green-btn"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs ls-red-btn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>PSD</td>
                    <td>Lorem ipsum dolor sit amet</td>
                    <td class="ls-table-progress">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuetransitiongoal="90"></div>
                        </div>
                    </td>
                    <td><span class="label label-light-green">On Way</span></td>
                    <td>
                        <button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-xs ls-light-green-btn"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs ls-red-btn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>PSD Theme</td>
                    <td>Lorem ipsum dolor sit amet</td>
                    <td class="ls-table-progress">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                    </td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                        <button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-xs ls-light-green-btn"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs ls-red-btn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Wordpress Theme</td>
                    <td>Lorem ipsum dolor sit amet</td>

                    <td class="ls-table-progress">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuetransitiongoal="80"></div>
                        </div>
                    </td>
                    <td><span class="label label-red">Error</span></td>
                    <td>
                        <button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-xs ls-light-green-btn"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs ls-red-btn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>HTML Template</td>
                    <td>Lorem ipsum dolor sit amet</td>

                    <td class="ls-table-progress">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuetransitiongoal="70"></div>
                        </div>
                    </td>
                    <td>
                        <span class="label label-light-green">On Way</span>
                    </td>
                    <td>
                        <button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-xs ls-light-green-btn"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs ls-red-btn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Plugin</td>
                    <td>Lorem ipsum dolor sit amet</td>

                    <td class="ls-table-progress">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuetransitiongoal="90"></div>
                        </div>
                    </td>
                    <td><span class="label label-success">Successfull</span></td>
                    <td>
                        <button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-xs ls-light-green-btn"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs ls-red-btn"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>
        <!--Table Wrapper Finish-->
    </div>
</div>

<div class="row home-row-top">
    <div class="col-md-4 col-sm-6">
        <div class="setting-widget">
            <div class="setting-widget-header">
                <h5 class="ls-header">Setting Widget <i class="fa fa-cog"></i></h5>
            </div>
            <div class="setting-widget-box">
                <ul>
                    <li>
                        Make invisible
                        <div class="setting-switch">
                            <input class="switchCheckBox" type="checkbox" checked data-size="mini"
                                   data-label-text="<span class='user-status is-online'></span>"
                                   data-on-text="<span class='fa fa-check'></span>"
                                   data-off-text="<span class='fa fa-times'></span>"
                                   data-on-color="success" data-off-color="danger">
                        </div>
                    </li>
                    <li>Self Destruct
                        <div class="setting-switch">
                            <input class="switchCheckBox" type="checkbox" checked data-size="mini"
                                   data-label-text="<i class='fa fa-gear'></i>"
                                   data-on-text="<i class='fa fa-check'></i>"
                                   data-off-text="<span class='fa fa-times'></span>">
                        </div>
                    </li>

                    <li>Currency
                        <div class="setting-switch">
                            <input class="switchCheckBox" type="checkbox" data-size="mini" checked
                                   data-label-text="<span class='fa fa-money fa-lg'></span>"
                                   data-on-text="<i class='fa fa-dollar'><i>"
                                   data-off-text="<i class='fa fa-eur'><i>">
                        </div>
                    </li>
                    <li>FireWall
                        <div class="setting-switch">
                            <input class="switchCheckBox" type="checkbox" data-size="mini"
                                   data-label-text="<span class='fa fa-shield'></span>"
                                   data-on-text="<i class='fa fa-check'><i>"
                                   data-off-text="<i class='fa fa-times'><i>"
                                   data-on-color="success" data-off-color="danger">
                        </div>
                    </li>
                    <!--<li>Change Color
                        <div class="setting-switch">
                            <div class="change-color-switch">
                                <ul>
                                    <li class="default active"></li>
                                    <li class="red-color"></li>
                                    <li class="blue-color"></li>
                                    <li class="light-green-color"></li>
                                    <li class="black-color"></li>
                                    <li class="deep-blue-color"></li>
                                </ul>
                            </div>
                        </div>
                    </li>-->

                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="skyWeather label-light-green white">
            <div class="current-weather">
                <div class="current-weather-icon">
                    <canvas id="rain" width="128" height="128">
                    </canvas>
                </div>
                <div class="current-weather-details">
                    <h2>20В°c</h2>
                    <span>Heavy Rani</span>
                    <p>24В°c / 12В°c</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="feature-weather">
                <ul>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="clear-day" width="32" height="32">
                            </canvas>
                            <span>Sat</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="clear-night" width="32" height="32">
                            </canvas>
                            <span>Sun</span>
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="partly-cloudy-day" width="32" height="32">
                            </canvas>
                            <span>Mon</span>
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="cloudy" width="32" height="32">
                            </canvas>
                            <span>Tue</span>
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <canvas id="fog" width="32" height="32">
                            </canvas>
                            <span>Wed</span>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-12">
        <div class="social-share-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="ls-fb-share social-share col-md-6 col-sm-3 col-xs-6">
                        <i class="fa fa-facebook"></i>
                        <div class="share-overlay">
                            <a href="#" class="expand">4.2K</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                    <div class="ls-tw-share social-share col-md-6 col-sm-3 col-xs-6">
                        <i class="fa fa-twitter"></i>
                        <div class="share-overlay">
                            <a href="#" class="expand">5.4K</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                    <div class="ls-google-plus social-share col-md-6 col-sm-3 col-xs-6">
                        <i class="fa fa-google-plus"></i>
                        <div class="share-overlay">
                            <a href="#" class="expand">7.8K</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                    <div class="ls-dribble-plus social-share col-md-6 col-sm-3 col-xs-6">
                        <i class="fa fa-dribbble"></i>
                        <div class="share-overlay">
                            <a href="#" class="expand">1.2K</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Element  End-->

</div>
</div>



</section>
<!--Page main section end -->
<!--Right hidden  section start-->
<section id="right-wrapper">
    <!--Right hidden  section close icon start-->
    <div class="close-right-wrapper">
        <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
    </div>
    <!--Right hidden  section close icon end-->

    <!--Tab navigation start-->
    <ul class="nav nav-tabs" id="setting-tab">
        <li class="active"><a href="#chatTab" data-toggle="tab"><i class="fa fa-comment-o"></i> Chat</a></li>
        <li><a href="#settingTab" data-toggle="tab"><i class="fa fa-cogs"></i> Setting</a></li>
    </ul>
    <!--Tab navigation end -->

    <!--Tab content start-->
    <div class="tab-content">
        <div class="tab-pane active" id="chatTab">
            <div class="nano">
                <div class="nano-content">
                    <div class="chat-group chat-group-fav">
                        <h3 class="ls-header">Favorites</h3>
                        <a href="javascript:void(0)">
                            <span class="user-status is-online"></span>
                            Catherine J. Watkins
                            <span class="badge badge-lightBlue">1</span>
                        </a>
                        <a href="javascript:void(0)">
                            <span class="user-status is-idle"></span>
                            Fernando G. Olson
                        </a>
                        <a href="javascript:void(0)">
                            <span class="user-status is-busy"></span>
                            Susan J. Best
                        </a>
                        <a href="javascript:void(0)">
                            <span class="user-status is-offline"></span>
                            Brandon S. Young
                        </a>
                    </div>
                    <div class="chat-group chat-group-coll">
                        <h3 class="ls-header">Colleagues</h3>
                        <a href="javascript:void(0)">
                            <span class="user-status is-offline"></span>
                            Brandon S. Young
                        </a>
                        <a href="javascript:void(0)">
                            <span class="user-status is-idle"></span>
                            Fernando G. Olson
                        </a>
                        <a href="javascript:void(0)">
                            <span class="user-status is-online"></span>
                            Catherine J. Watkins
                            <span class="badge badge-lightBlue">3</span>
                        </a>

                        <a href="javascript:void(0)">
                            <span class="user-status is-busy"></span>
                            Susan J. Best
                        </a>

                    </div>
                    <div class="chat-group chat-group-social">
                        <h3 class="ls-header">Social</h3>
                        <a href="javascript:void(0)">
                            <span class="user-status is-online"></span>
                            Catherine J. Watkins
                            <span class="badge badge-lightBlue">5</span>
                        </a>
                        <a href="javascript:void(0)">
                            <span class="user-status is-busy"></span>
                            Susan J. Best
                        </a>
                    </div>
                </div>
            </div>

            <div class="chat-box">
                <div class="chat-box-header">
                    <h5>
                        <span class="user-status is-online"></span>
                        Catherine J. Watkins
                    </h5>
                </div>

                <div class="chat-box-content">
                    <div class="nano nano-chat">
                        <div class="nano-content">

                            <ul>
                                <li>
                                    <span class="user">Catherine</span>
                                    <p>Are you here?</p>
                                    <span class="time">10:10</span>
                                </li>
                                <li>
                                    <span class="user">Catherine</span>
                                    <p>Whohoo!</p>
                                    <span class="time">10:12</span>
                                </li>
                                <li>
                                    <span class="user">Catherine</span>
                                    <p>This message is pre-queued.</p>
                                    <span class="time">10:15</span>
                                </li>
                                <li>
                                    <span class="user">Catherine</span>
                                    <p>Do you like it?</p>
                                    <span class="time">10:20</span>
                                </li>
                                <li>
                                    <span class="user">Catherine</span>
                                    <p>This message is pre-queued.</p>
                                    <span class="time">11:00</span>
                                </li>
                                <li>
                                    <span class="user">Catherine</span>
                                    <p>Hi, you there ?</p>
                                    <span class="time">12:00</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="chat-write">
                <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
            </div>
        </div>

        <div class="tab-pane" id="settingTab">

            <div class="setting-box">
                <h3 class="ls-header">Account Setting</h3>
                <div class="setting-box-content">
                    <ul>
                        <li><span class="pull-left">Online status: </span><input type="checkbox" class="js-switch-red" checked/></li>
                        <li><span class="pull-left">Show offline contact: </span><input type="checkbox" class="js-switch-light-blue" checked/></li>
                        <li><span class="pull-left">Invisible mode: </span><input class="js-switch" type="checkbox" checked></li>
                        <li><span class="pull-left">Log all message:</span><input class="js-switch-light-green" type="checkbox" checked></li>
                    </ul>
                </div>
            </div>
            <div class="setting-box">
                <h3 class="ls-header">Maintenance</h3>
                <div class="setting-box-content">
                    <div class="easy-pai-box">
                                <span class="easyPieChart" data-percent="90">
                                    <span class="easyPiePercent"></span>
                                </span>
                    </div>
                    <div class="easy-pai-box">
                        <button class="btn btn-xs ls-red-btn js_update">Update Data</button>
                    </div>
                </div>
            </div>

            <div class="setting-box">
                <h3 class="ls-header">Progress</h3>
                <div class="setting-box-content">

                    <h5>File uploading</h5>
                    <div class="progress">
                        <div class="progress-bar ls-light-blue-progress six-sec-ease-in-out"
                             aria-valuetransitiongoal="10"></div>
                    </div>

                    <h5>Plugin setup</h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar six-sec-ease-in-out ls-light-green-progress"
                             aria-valuetransitiongoal="20"></div>
                    </div>
                    <h5>Post New Article</h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar ls-yellow-progress six-sec-ease-in-out"
                             aria-valuetransitiongoal="80"></div>
                    </div>
                    <h5>Create New User</h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar ls-red-progress six-sec-ease-in-out"
                             aria-valuetransitiongoal="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Tab content -->
</section>
<!--Right hidden  section end -->
<!--<div id="change-color">
    <div id="change-color-control">
        <a href="javascript:void(0)"><i class="fa fa-magic"></i></a>
    </div>
    <div class="change-color-box">
        <ul>
            <li class="default active"></li>
            <li class="red-color"></li>
            <li class="blue-color"></li>
            <li class="light-green-color"></li>
            <li class="black-color"></li>
            <li class="deep-blue-color"></li>
        </ul>
    </div>
</div>-->
</section>

</body>
</html>