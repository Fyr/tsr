<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('Informer', 'User.Model');
class AdminInformersController extends AdminObjectTypeController {
    public $name = 'AdminInformers';
    public $uses = array('User.Informer', 'User.Campaign', 'User.InformerStatus', 'User.InformerCategory');
    
    protected $objectType = 'Informer';
    
    public function index() {
    	$this->paginate = array(
    		'fields' => array('id', 'created', 'campaign_id', 'title', 'status')
    	);
    	$this->PCTableGrid->paginate($this->objectType);
    	
    	$this->set('aCampaignOptions', $this->Campaign->options());
    	$this->set('aStatusOptions', $this->InformerStatus->options());
    	// $this->set('aCategoryOptions', $this->AdvertCategory->getObjectOptions());
    }
    
    public function edit($id = 0) {
    	$this->set('aCampaignOptions', $this->Campaign->options());
    	$this->set('aStatusOptions', $this->InformerStatus->options());
		
    	$this->fieldSet = array(
    		'id' => array('hidden'),
    		'campaign_id' => array('options' => $this->Campaign->options()),
    		'status' => array('options' => $this->InformerStatus->options()),
    		// 'advert_category_id' => array('options' => $this->InformerCategory->getObjectOptions()),
    		'title' => array(),
    	);
    	
    	parent::edit($id);
    }
}
