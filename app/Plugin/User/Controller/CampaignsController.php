<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('CampaignStatus', 'User.Model');
class CampaignsController extends UserAppController {
	public $name = 'Campaigns';
	public $uses = array('User.Campaign', 'User.CampaignStatus', 'User.CampaignCategory', 'User.StatService');
	public $helpers = array('ObjectType');
	
	public function index() {
		$conditions = array('user_id' => $this->currUserID);
		$conditions = $this->applyFilters($conditions);
		$order = 'created DESC';
		$this->set('aCampaigns', $this->Campaign->find('all', compact('conditions', 'order')));
		$this->set('aStatusOptions', $this->CampaignStatus->options());
	}

	public function edit($id = 0) {
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Campaign.user_id', $this->currUserID);
			$this->request->data('Campaign.status', CampaignStatus::MODERATION);
			if ($this->Campaign->save($this->request->data)) {
				$this->setFlash(__('Your campaign has been saved'), 'success');
				return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
			}
		} else {
			$this->request->data = $this->Campaign->findById($id);
		}
		
		$this->set('aCategoryOptions', $this->CampaignCategory->getObjectOptions());
		$this->set('aStatServiceOptions', $this->StatService->options());
	}
	
	public function stats() {
		$this->set('aStats', array());
	}
}
