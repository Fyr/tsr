<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('CampaignStatus', 'User.Model');
class CampaignsController extends UserAppController {
	public $name = 'Campaigns';
	public $uses = array('User.Domain', 'User.Campaign', 'User.CampaignStatus', 'User.SiteCategory', 'User.StatService');
	public $helpers = array('ObjectType');
	
	public function index() {
		$conditions = array('user_id' => $this->currUserID);
		$conditions = $this->applyFilters($conditions);
		$order = 'Campaign.created DESC';
		$this->set('aCampaigns', $this->Campaign->find('all', compact('conditions', 'order')));
		$this->set('aStatusOptions', $this->CampaignStatus->options());
	}

	public function edit($id = 0) {
		if ($id && !$this->Campaign->isAvail($id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			$this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
			return;
		}
		
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Domain.user_id', $this->currUserID);
			$this->request->data('Campaign.status', CampaignStatus::MODERATION);
			
			if ($this->Campaign->saveAll($this->request->data)) {
				$this->setFlash(__('Your campaign has been saved'), 'success');
				return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
			} else {
				$this->setFlash(__('Form could not be saved! Please, check errors below'), 'error');
			}
		} else {
			$this->request->data = $this->Campaign->findById($id);
		}
		
		$this->set('aDomainOptions', $this->Domain->options());
		$this->set('aCategoryOptions', $this->SiteCategory->getObjectOptions());
		$this->set('aStatServiceOptions', $this->StatService->options());
	}
	
	public function stats($id) {
		if (!$this->Campaign->isAvail($id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			$this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
			return;
		}
		
		$this->set('campaign', $this->Campaign->findById($id));
		$this->set('aStats', array());
	}
}
