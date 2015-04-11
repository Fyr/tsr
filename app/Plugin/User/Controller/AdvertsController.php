<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('AdvertStatus', 'User.Model');
class AdvertsController extends UserAppController {
	public $name = 'Adverts';
	public $uses = array('User.Advert', 'User.Campaign', 'User.AdvertStatus', 'User.AdvertCategory');
	
	public function index($campaign_id) {
		
		$conditions = array('campaign_id' => $campaign_id);
		
		$conditions = $this->applyFilters($conditions);
		
		$order = 'created DESC';
		$this->set('aAdverts', $this->Advert->find('all', compact('conditions', 'order')));
		$this->set('aStatusOptions', $this->AdvertStatus->options());
		$this->set('aCategoryOptions', $this->AdvertCategory->getObjectOptions());
		$this->set('campaign', $this->Campaign->findById($campaign_id));
	}

	public function edit($id = 0, $campaign_id = 0) {
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Advert.status', AdvertStatus::MODERATION);
			if ($this->Advert->save($this->request->data)) {
				$this->setFlash(__('Your advert has been saved'), 'success');
				return $this->redirect(array('controller' => 'Adverts', 'action' => 'index', $this->request->data('Advert.campaign_id')));
			}
		} else {
			$this->request->data = $this->Advert->findById($id);
		}
		
		if ($campaign_id) {
			$this->request->data('Advert.campaign_id', $campaign_id);
		}
		
		$this->set('campaign', $this->Campaign->findById($this->request->data('Advert.campaign_id')));
		$this->set('aCategoryOptions', $this->AdvertCategory->getObjectOptions());
	}
	
	public function delete($id) {
		$rec = $this->Advert->findById($id);
		if ($rec) {
			$campaign_id = $rec['Advert']['campaign_id'];
			$this->Advert->delete($id);
			$this->setFlash(__('Your advert has been deleted'));
			return $this->redirect(array('controller' => 'Adverts', 'action' => 'index', $campaign_id));
		}
		return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
	}
	
	public function block($id) {
		$rec = $this->Advert->findById($id);
		if ($rec) {
			$campaign_id = $rec['Advert']['campaign_id'];
			$this->Advert->save(array('id' => $id, 'status' => AdvertStatus::BLOCKED));
			$this->setFlash(__('Your advert has been blocked'));
			return $this->redirect(array('controller' => 'Adverts', 'action' => 'index', $campaign_id));
		}
		return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
	}
}
