<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('Widget', 'User.Model');
class AdminWidgetsController extends AdminObjectTypeController {
    public $name = 'AdminWidgets';
    public $uses = array('User.Widget', 'User.Campaign', 'User.WidgetStatus', 'User.WidgetCategory');
    
    protected $objectType = 'Widget';
    
    public function index() {
    	$this->paginate = array(
    		'fields' => array('id', 'created', 'campaign_id', 'title', 'status')
    	);
    	$this->PCTableGrid->paginate($this->objectType);
    	
    	$this->set('aCampaignOptions', $this->Campaign->options());
    	$this->set('aStatusOptions', $this->WidgetStatus->options());
    	// $this->set('aCategoryOptions', $this->AdvertCategory->getObjectOptions());
    }
    
    public function edit($id = 0) {
    	$this->set('aCampaignOptions', $this->Campaign->options());
    	$this->set('aStatusOptions', $this->WidgetStatus->options());
		
    	$this->fieldSet = array(
    		'id' => array('hidden'),
    		'campaign_id' => array('options' => $this->Campaign->options()),
    		'status' => array('options' => $this->WidgetStatus->options()),
    		// 'advert_category_id' => array('options' => $this->WidgetCategory->getObjectOptions()),
    		'title' => array(),
    	);
    	
    	parent::edit($id);
    }
}
