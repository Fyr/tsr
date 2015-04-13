<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('InformerStatus', 'User.Model');
class InformersController extends UserAppController {
	public $name = 'Informers';
	public $uses = array('User.Campaign', 'User.InformerStatus', 'User.Informer');
	
	public function index($campaign_id) {
		$conditions = array('campaign_id' => $campaign_id);
		
		$conditions = $this->applyFilters($conditions);
		
		$order = 'created DESC';
		$this->set('aInformers', $this->Informer->find('all', compact('conditions', 'order')));
		$this->set('aStatusOptions', $this->InformerStatus->options());
		$this->set('campaign', $this->Campaign->findById($campaign_id));
	}

	public function edit($id = 0, $campaign_id = 0) {
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Informer.status', InformerStatus::MODERATION);
			if ($this->Informer->save($this->request->data)) {
				$this->setFlash(__('Your informer has been saved'), 'success');
				return $this->redirect(array('controller' => 'Informers', 'action' => 'index', $this->request->data('Informer.campaign_id')));
			}
		} else {
			$this->request->data = $this->Informer->findById($id);
		}
		
		if ($campaign_id) {
			$this->request->data('Informer.campaign_id', $campaign_id);
		}
		
		$this->set('campaign', $this->Campaign->findById($this->request->data('Informer.campaign_id')));
		// $this->set('aCategoryOptions', $this->AdvertCategory->getObjectOptions());
	}
	
	public function delete($id) {
		$rec = $this->Informer->findById($id);
		if ($rec) {
			$campaign_id = $rec['Informer']['campaign_id'];
			$this->Informer->delete($id);
			$this->setFlash(__('Your informer has been deleted'));
			return $this->redirect(array('controller' => 'Informers', 'action' => 'index', $campaign_id));
		}
		return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
	}
	
	public function stats($id) {
		$rec = $this->Informer->findById($id);
		
		$this->set('aStats', array());
		$this->set('campaign', $this->Campaign->findById($rec['Informer']['campaign_id']));
	}
}
