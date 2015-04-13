<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('Campaign', 'User.Model');
class AdminCampaignsController extends AdminObjectTypeController {
    public $name = 'AdminCampaigns';
    public $uses = array('User', 'User.Campaign', 'User.CampaignStatus', 'User.CampaignCategory', 'User.StatService');
    
    protected $objectType = 'Campaign';
    
    public function index() {
    	$this->paginate = array(
    		'fields' => array('id', 'created', 'user_id', 'campaign_category_id', 'domain', 'status')
    	);
    	$this->PCTableGrid->paginate($this->objectType);
    	$this->set('aUserOptions', $this->User->find('list', array('fields' => array('id', 'username'))));
    	$this->set('aStatusOptions', $this->CampaignStatus->options());
    	$this->set('aCategoryOptions', $this->CampaignCategory->getObjectOptions());
    }
    
    public function edit($id = 0) {
    	$this->fieldSet = array(
    		'id' => array('hidden'),
    		'user_id' => array('options' => $this->User->find('list', array('fields' => array('id', 'username')))),
    		'status' => array('options' => $this->CampaignStatus->options()),
    		'domain' => array(),
    		'campaign_category_id' => array('options' => $this->CampaignCategory->getObjectOptions()),
    		'stat_service_id' => array('options' => $this->StatService->options()),
    		'stat_url' => array(),
    		'login' => array(),
    		'mirrors' => array(),
    		'comment' => array()
    	);
    	
    	parent::edit($id);
    }
}
