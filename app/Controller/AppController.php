<?php
App::uses('Controller', 'Controller');
App::uses('User', 'Model');
App::uses('UserGroup', 'Model');
App::uses('Media', 'Media.Model');

class AppController extends Controller {
	public $uses = array('User', 'UserGroup', 'Media.Media');
	public $components = array(
		'Session', 'RequestHandler',
		'Auth' => array(
			'authorize'      => array('Controller'),
			'loginAction'    => array('plugin' => '', 'controller' => 'Pages', 'action' => 'home', '#' => 'login'),
			'loginRedirect'  => array('plugin' => 'user', 'controller' => 'Dashboard', 'action' => 'index', '#' => ''),
			'logoutRedirect' => '/'
		),
	);
	
	public $paginate;
	protected $aNavBar = array(), $aBottomLinks = array(), $currMenu = '', $currLink = '', $pageTitle = '', $aBreadCrumbs = array();
	protected $currUserID, $currUser, $currLang;
	
	public function __construct($request = null, $response = null) {
		$this->_beforeInit();
		parent::__construct($request, $response);
		$this->_afterInit();
	}
	
	protected function _beforeInit() {
	    $this->helpers = array_merge(array('Html', 'Form', 'Paginator', 'Media', 'ArticleVars', 'ObjectType'), $this->helpers);
	}

	protected function _afterInit() {
	    // after construct actions here
	}
	
	public function isAuthorized($user) {
		return true;
	}
	
	public function beforeFilter() {
		$this->beforeFilterLayout();
	}
	
	protected function beforeFilterLayout() {
		/*
		$this->aNavBar = array(
			'Home' => array('label' => __('Home'), 'href' => array('controller' => 'Pages', 'action' => 'home')),
			'News' => array('label' => __('News'), 'href' => array('controller' => 'Articles', 'action' => 'index', 'objectType' => 'News')),
			'Products' => array('label' => __('Products catalogue'), 'href' => array('controller' => 'SiteProducts', 'action' => 'index')),
			'Articles' => array('label' => __('Articles'), 'href' => array('controller' => 'Articles', 'action' => 'index', 'objectType' => 'SiteArticle')),
			'o-proekte' => array('label' => __('About us'), 'href' => array('controller' => 'pages', 'action' => 'view', 'o-proekte.html')),
			'Contacts' => array('label' => __('Contacts'), 'href' => array('controller' => 'SiteContacts', 'action' => 'index'))
		);
		*/
		$this->aBottomLinks = $this->aNavBar;
		$this->currMenu = $this->_getCurrMenu();
	    $this->currLink = $this->currMenu;
	    
	    $this->_initLang();
	    
	    $this->Auth->allow(array('home', 'view'));
	    if ($this->Auth->loggedIn()) {
			$this->currUserID = $this->Auth->user('id');
			$this->currUser = $this->User->findById($this->currUserID);
		}
	}
	
	protected function _initLang() {
		$this->currLang = (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'per') ? 'per' : 'eng';
		Configure::write('Config.language', $this->currLang);
	}
	
	protected function _getCurrMenu() {
		$curr_menu = strtolower(str_ireplace('Site', '', $this->request->controller)); // By default curr.menu is the same as controller name
		/*
		foreach($this->aNavBar as $currMenu => $item) {
			if (isset($item['submenu'])) {
				foreach($item['submenu'] as $_currMenu => $_item) {
					if (strtolower($_currMenu) === $curr_menu) {
						return $currMenu;
					}
				}
			}
		}
		*/
		return $curr_menu;
	}
	
	public function beforeRender() {
		$this->set('aNavBar', $this->aNavBar);
		$this->set('currMenu', $this->currMenu);
		$this->set('aBottomLinks', $this->aBottomLinks);
		$this->set('currLink', $this->currLink);
		$this->set('pageTitle', $this->pageTitle);
		$this->set('aBreadCrumbs', $this->aBreadCrumbs);
		$this->set('hasAdminAccess', $this->hasAdminAccess());
		
		$this->beforeRenderLayout();
	}
	
	protected function beforeRenderLayout() {
		$this->set('currUser', $this->currUser);
		$this->set('currLang', $this->currLang);
	}
	
	/**
	 * Sets flashing message
	 *
	 * @param str $msg
	 * @param str $type - must be 'success', 'error' or empty
	 */
	protected function setFlash($msg, $type = 'info') {
		$this->Session->setFlash($msg, 'default', array(), $type);
	}
	
	public function currUserGroup() {
		return ($this->Auth->loggedIn()) ? AuthComponent::user('user_group_id') : null;
	}
	
	public function hasAdminAccess() {
		return $this->UserGroup->hasAdminAccess($this->currUserGroup());
	}
}
