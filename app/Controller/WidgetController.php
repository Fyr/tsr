<?php
App::uses('AppController', 'Controller');
class WidgetController extends AppController {
	public $name = 'Widget';
	public $uses = array('User.Widget');
	public $components = false;
	public $helpers = array('Html');
	public $layout = false;
	
	public function beforeFilter() {
	}

	public function script($id = 0) {
		$this->set('widget', $this->Widget->findById(intval($id)));
	}
}
