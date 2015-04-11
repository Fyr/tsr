<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
class AdminAdvertsController extends AdminObjectTypeController {
    public $name = 'AdminAdverts';
    public $uses = array('User.Advert', 'User.Campaign', 'User.AdvertStatus', 'User.AdvertCategory');
    
    protected $objectType = 'Advert';
    
    public function index() {
    	$this->paginate = array(
    		'fields' => array('id', 'created', 'campaign_id', 'title', 'advert_category_id', 'status')
    	);
    	$this->PCTableGrid->paginate($this->objectType);
    	
    	$this->set('aCampaignOptions', $this->Campaign->options());
    	$this->set('aStatusOptions', $this->AdvertStatus->options());
    	$this->set('aCategoryOptions', $this->AdvertCategory->getObjectOptions());
    	
    }
    
    public function edit($id = 0) {
    	$this->set('aCampaignOptions', $this->Campaign->options());
    	$this->set('aStatusOptions', $this->AdvertStatus->options());
    	$this->set('aCategoryOptions', $this->AdvertCategory->getObjectOptions());
		
    	$this->fieldSet = array(
    		'id' => array('hidden'),
    		'campaign_id' => array('options' => $this->Campaign->options()),
    		'status' => array('options' => $this->AdvertStatus->options()),
    		'advert_category_id' => array('options' => $this->AdvertCategory->getObjectOptions()),
    		'url' => array(),
    		'title' => array(),
    		'descr' => array(),
    	);
    	
    	parent::edit($id);
    }
}
