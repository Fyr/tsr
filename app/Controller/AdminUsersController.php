<?php
App::uses('AdminController', 'Controller');
App::uses('User', 'Model');
App::uses('UserGroup', 'Model');
class AdminUsersController extends AdminController {
    public $name = 'AdminUsers';
    public $uses = array('User', 'UserGroup');
    
    public function beforeFilter() {
		if (!$this->isAdmin()) {
			$this->redirect(array('controller' => 'Admin', 'action' => 'index'));
			return;
		}
		parent::beforeFilter();
	}
    
    public function beforeRender() {
    	parent::beforeRender();
    	$this->set('objectType', 'User');
    }
    
    public function index() {
    	$this->paginate = array(
    		'fields' => array('id', 'created', 'username', 'active')
    	);
    	$this->PCTableGrid->paginate('User');
    }
    
    public function edit($id = 0) {
    	if ($this->request->is(array('put', 'post'))) {
			if ($this->User->save($this->request->data)) {
				$baseRoute = array('action' => 'index');
				$id = $this->User->id;
				return $this->redirect(($this->request->data('apply')) ? $baseRoute : array($id));
			}
		} elseif ($id) {
			$this->request->data = $this->User->findById($id);
			$this->request->data('User.password', '');
		}
		
		$this->set('aUserGroupOptions', $this->UserGroup->options());
    }
}
