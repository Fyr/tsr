<?php
App::uses('AdminController', 'Controller');
class AdminObjectTypeController extends AdminController {
    public $name = 'AdminObjectType';
    // public $uses = array('CampaignCategory');
    
    protected $objectType = NULL; // Must be redefined!!!
    protected $fieldSet = array(
    	'id' => array('type' => 'hidden'), 
    	'title' => array()
    );
    
    public function beforeFilter() {
    	parent::beforeFilter();
    }
    
    public function beforeRender() {
    	parent::beforeRender();
    	$this->set('objectType', $this->objectType);
    	$this->set('fieldSet', $this->fieldSet);
    }
    
    public function index() {
    	$this->loadModel($this->objectType);
    	$this->paginate = array(
    		'fields' => array_keys($this->fieldSet)
    	);
    	$this->PCTableGrid->paginate($this->objectType);
    }
    
    public function edit($id = 0) {
    	if ($this->request->is(array('put', 'post'))) {
			if ($this->{$this->objectType}->save($this->request->data)) {
				$baseRoute = array('action' => 'index');
				$id = $this->{$this->objectType}->id;
				return $this->redirect(($this->request->data('apply')) ? $baseRoute : array($id));
			}
		} elseif ($id) {
			$this->request->data = $this->{$this->objectType}->findById($id);
		}
    }
}
