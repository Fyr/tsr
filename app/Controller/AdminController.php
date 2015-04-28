<?php
App::uses('AppController', 'Controller');
App::uses('UserGroup', 'Model');
class AdminController extends AppController {
	public $name = 'Admin';
	public $layout = 'admin';
	// public $components = array();
	public $uses = array();

	public function _beforeInit() {
	    // auto-add included modules - did not included if child controller extends AdminController
	    $this->components = array_merge(array('Auth', 'Core.PCAuth', 'Table.PCTableGrid'), $this->components);
	    $this->helpers = array_merge(array('Html', 'Table.PHTableGrid', 'Form.PHForm'), $this->helpers);
	    
		$this->aNavBar = array(
			'Content' => array('label' => __('Content'), 'href' => '', 'submenu' => array(
				array('label' => __('Static pages'), 'href' => array('controller' => 'AdminContent', 'action' => 'index', 'Page')),
				array('label' => __('News'), 'href' => array('controller' => 'AdminContent', 'action' => 'index', 'News')),
				array('label' => __('Articles'), 'href' => array('controller' => 'AdminContent', 'action' => 'index', 'SiteArticle')),
			)),
			'Campaigns' => array('label' => __('Campaigns'), 'href' => '', 'submenu' => array(
				array('label' => __('Campaigns'), 'href' => array('controller' => 'AdminCampaigns', 'action' => 'index')),
				array('label' => __('Adverts'), 'href' => array('controller' => 'AdminAdverts', 'action' => 'index')),
				array('label' => __('Widgets'), 'href' => array('controller' => 'AdminWidgets', 'action' => 'index')),
				array('label' => __('Site categories'), 'href' => array('controller' => 'AdminSiteCategories', 'action' => 'index')),
				array('label' => __('Advert categories'), 'href' => array('controller' => 'AdminAdvertCategories', 'action' => 'index')),
				array('label' => __('Widget categories'), 'href' => array('controller' => 'AdminWidgetCategories', 'action' => 'index')),
			)),
			'Users' => array('label' => __('Users'), 'href' => array('controller' => 'AdminUsers', 'action' => 'index')),
			'Settings' => array('label' => __('Settings'), 'href' => '', 'submenu' => array(
				array('label' => __('System'), 'href' => array('controller' => 'AdminSettings', 'action' => 'index')),
			))
		);
		$this->aBottomLinks = $this->aNavBar;
	}
	
	public function beforeFilter() {
		if (!$this->isAdmin()) {
			$this->aNavBar = array(
				'Campaigns' => array('label' => __('Campaigns'), 'href' => '', 'submenu' => array(
					array('label' => __('Campaigns'), 'href' => array('controller' => 'AdminCampaigns', 'action' => 'index')),
					array('label' => __('Adverts'), 'href' => array('controller' => 'AdminAdverts', 'action' => 'index')),
					array('label' => __('Widgets'), 'href' => array('controller' => 'AdminWidgets', 'action' => 'index')),
				))
			);
		}
	    $this->currMenu = $this->_getCurrMenu();
	    $this->currLink = $this->currMenu;
	}
	
	public function beforeRenderLayout() {
		// $this->set('isAdmin', $this->isAdmin());
	}
	
	public function isAuthorized($user) {
		if (!$this->UserGroup->hasAdminAccess($this->currUserGroup())) {
			$this->redirect($this->Auth->loginAction);
			return false;
		}
		$this->set('currUser', $user);
		return true;
	}
	
	public function isAdmin() {
		return AuthComponent::user('user_group_id') == UserGroup::ADMIN;
	}

	public function index() {
		//$this->redirect(array('controller' => 'AdminProducts'));
	}
	
	protected function _getCurrMenu() {
		$curr_menu = str_ireplace('Admin', '', $this->request->controller); // By default curr.menu is the same as controller name
		return $curr_menu;
	}

	public function delete($id) {
		$this->autoRender = false;

		$model = $this->request->query('model');
		if ($model) {
			$this->loadModel($model);
			if (strpos($model, '.') !== false) {
				list($plugin, $model) = explode('.',$model);
			}
			$this->{$model}->delete($id);
		}
		if ($backURL = $this->request->query('backURL')) {
			$this->redirect($backURL);
			return;
		}
		$this->redirect(array('controller' => 'Admin', 'action' => 'index'));
	}
	
}
