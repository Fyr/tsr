<?php
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

// Configure::write('Config.language', 'rus');

CakePlugin::loadAll();

Configure::write('domain', array(
	'url' => 'creozo.dev',
	'title' => 'Creozo.Dev'
));

define('AUTH_ERROR', __('Invalid username or password, try again'));
define('TEST_ENV', $_SERVER['SERVER_ADDR'] == '192.168.1.22');

define('EMAIL_ADMIN', 'fyr.work@gmail.com');
define('EMAIL_ADMIN_CC', 'fyr.work@gmail.com');

define('PATH_FILES_UPLOAD', $_SERVER['DOCUMENT_ROOT'].'/files/');

Configure::write('Advert', array(
	'maxTitleLen' => 70,
	'maxDescrLen' => 250,
));

Configure::write('Widget', array(
	'maxTitleLen' => 70,
	'image_size_options' => array(
		'50' => '50x50px', '60' => '60x60px', '70' => '70x70px', '80' => '80x80px', '90' => '90x90px', 
		'100' => '100x100px', '120' => '120x120px', '140' => '140x140px', '180' => '180x180px', '200' => '200x200px',
		'custom' => __('custom')
	),
	'image_pos_options' => array('above' => __('above'), 'behind' => __('behind'), 'left' => __('left'), 'right' => __('right')),
	'font_weight_options' => array('normal' => __('normal'), 'bold' => __('bold')),
	'font_family_options' => array(
		'Arial' => 'Arial', 
		'Courier New' => 'Courier New', 
		'Georgia' => 'Georgia', 
		'Tahoma' => 'Tahoma', 
		'Times New Roman' => 'Times New Roman', 
		'Verdana' => 'Verdana'
	),
));


function fdebug($data, $logFile = 'tmp.log', $lAppend = true) {
	file_put_contents($logFile, mb_convert_encoding(print_r($data, true), 'cp1251', 'utf8'), ($lAppend) ? FILE_APPEND : null);
	return $data;
}