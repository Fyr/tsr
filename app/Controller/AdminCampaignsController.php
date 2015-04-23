<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('Campaign', 'User.Model');
class AdminCampaignsController extends AdminObjectTypeController {
    public $name = 'AdminCampaigns';
    public $uses = array('User', 'User.Domain', 'User.Campaign', 'User.CampaignStatus', 'User.SiteCategory', 'User.StatService');
    
    protected $objectType = 'Campaign';
    
    public function index() {
    	$this->paginate = array(
    		'fields' => array('Campaign.id', 'Campaign.created', 'Domain.user_id', 'Domain.site_category_id', 'Domain.domain', 'Campaign.status')
    	);
    	$this->PCTableGrid->paginate($this->objectType);
    	$this->set('aUserOptions', $this->User->find('list', array('fields' => array('id', 'username'))));
    	$this->set('aStatusOptions', $this->CampaignStatus->options());
    	$this->set('aCategoryOptions', $this->SiteCategory->getObjectOptions());
    }
    
    public function edit($id = 0) {
    	$this->fieldSet = array(
    		'Domain.id' => array('hidden'),
    		'Campaign.id' => array('hidden'),
    		'Domain.user_id' => array('options' => $this->User->find('list', array('fields' => array('id', 'username')))),
    		'Campaign.status' => array('options' => $this->CampaignStatus->options()),
    		'Domain.domain' => array(),
    		'Domain.site_category_id' => array('options' => $this->SiteCategory->getObjectOptions()),
    		'Domain.stat_service_id' => array('options' => $this->StatService->options()),
    		'Domain.stat_url' => array(),
    		'Domain.login' => array(),
    		'Domain.mirrors' => array(),
    		'Campaign.title' => array(),
    		'Campaign.comment' => array()
    	);
    	
    	parent::edit($id);
    }
}
