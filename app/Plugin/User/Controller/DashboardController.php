<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
class DashboardController extends UserAppController {
	public $name = 'Dashboard';
	
	public function index() {
		return $this->redirect(array('plugin' => 'user', 'controller' => 'Campaign', 'action' => 'index'));
	}
}
