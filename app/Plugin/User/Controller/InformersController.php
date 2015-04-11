<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('CampaignStatus', 'User.Model');
class InformersController extends UserAppController {
	public $name = 'Informers';
	public $uses = array('User.Campaign', 'User.InformerStatus', 'User.Informer');
	
	public function index() {
		$conditions = array('campaign_id' => $campaign_id);
		
		$conditions = $this->applyFilters($conditions);
		
		$order = 'created DESC';
		$this->set('aInformers', $this->Informer->find('all', compact('conditions', 'order')));
		$this->set('aStatusOptions', $this->InformerStatus->options());
		$this->set('campaign', $this->Campaign->findById($campaign_id));
	}

	public function edit($id = 0) {
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Campaign.user_id', $this->currUserID);
			$this->request->data('Campaign.status', CampaignStatus::MODERATION);
			if ($this->Campaign->save($this->request->data)) {
				$this->setFlash(__('Your campaign has been saved'));
				return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
			}
		} else {
			$this->request->data = $this->Campaign->findById($id);
		}
		
		$this->set('aCategoryOptions', $this->CampaignCategory->getObjectOptions());
		$this->set('aStatServiceOptions', $this->StatService->options());
	}
}
