<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('AdvertStatus', 'User.Model');
class AdvertsController extends UserAppController {
	public $name = 'Adverts';
	public $uses = array('User.Advert', 'User.Campaign', 'User.AdvertStatus', 'User.AdvertCategory');
	
	protected $_response = array('status' => 'OK');
	
	public function beforeRender() {
		parent::beforeRender();
		if ($this->request->is('ajax')) {
			$this->layout = 'ajax';
			$this->set('_response', $this->_response);
    		$this->set('_serialize', '_response');
		}
	}
	
	public function index($campaign_id) {
		if (!$this->Campaign->isAvail($campaign_id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			return $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
		}
		
		$conditions = array('campaign_id' => $campaign_id);
		$conditions = $this->applyFilters($conditions);
		$order = 'Advert.created DESC';
		$this->set('aAdverts', $this->Advert->find('all', compact('conditions', 'order')));
		$this->set('aStatusOptions', $this->AdvertStatus->options());
		$this->set('aCategoryOptions', $this->AdvertCategory->getObjectOptions());
		$this->set('campaign', $this->Campaign->findById($campaign_id));
	}

	public function edit($id = 0, $campaign_id = 0) {
		$lAccess = true;
		if ($campaign_id && !$this->Campaign->isAvail($campaign_id, $this->currUserID)) {
			$lAccess = false;
		} elseif ($id && !$this->Advert->isAvail($id, $this->currUserID)) {
			$lAccess = false;
		} elseif (!$id && !$campaign_id) {
			$lAccess = false;
		}
		if (!$lAccess) {
			if ($this->request->is('ajax')) {
				$this->_response = array('status' => 'ERROR', 'errMsg' => __('You have no access'));
			} else {
				$this->setFlash(__('You have no access'), 'error');
				$this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
			}
			return;
		}
		
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Advert.status', AdvertStatus::MODERATION);
			if (!$this->request->data('AdvertMedia.id')) {
				unset($this->request->data['AdvertMedia']);
			}
			if (!$this->request->data('AdvertMedia.crop')) {
				unset($this->request->data['AdvertMedia']);
			}
			if ($this->Advert->saveAll($this->request->data)) {
				// TODO: если картинка не загружалась, но изменился crop - то нужно перерезать thumb или не сохранять его
				if (($media_id = $this->request->data('AdvertMedia.id')) && ($crop = $this->request->data('AdvertMedia.crop'))) {
					$this->Media->recrop($media_id, $crop);
				}
				$this->setFlash(__('Your advert has been saved'), 'success');
				if ($this->request->is('ajax')) {
					$this->_response = array('status' => 'OK', 'data' => $this->Advert->findById($this->Advert->id));
					return;
				}
				return $this->redirect(array('controller' => 'Adverts', 'action' => 'index', $this->request->data('Advert.campaign_id')));
			} else {
				if ($this->request->is('ajax')) {
					$this->_response = array('status' => 'ERROR', 'errMsg' => __('Form could not be saved! Please, check errors'), 'invalidFields' => $this->Advert->invalidFields());
				} else {
					$this->setFlash(__('Form could not be saved! Please, check errors'), 'error');
				}
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
		if (!$this->Advert->isAvail($id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			return $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
		}
		
		$rec = $this->Advert->findById($id);
		if ($rec) {
			$campaign_id = $rec['Advert']['campaign_id'];
			$this->Advert->delete($id);
			$this->setFlash(__('Your advert has been deleted'));
			return $this->redirect(array('controller' => 'Adverts', 'action' => 'index', $campaign_id));
		}
		return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
	}
	
	public function block($id, $blocked) {
		if (!$this->Advert->isAvail($id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			return $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
		}
		
		$rec = $this->Advert->findById($id);
		if ($rec) {
			if ($blocked && $rec['Advert']['status'] == AdvertStatus::ACTIVE) {
				$this->Advert->save(array('id' => $id, 'status' => AdvertStatus::BLOCKED));
				$this->setFlash(__('Your advert has been blocked'));
			} else if (!$blocked && $rec['Advert']['status'] == AdvertStatus::BLOCKED) {
				$this->Advert->save(array('id' => $id, 'status' => AdvertStatus::ACTIVE));
				$this->setFlash(__('Your advert has been activated'));
			}
			$campaign_id = $rec['Advert']['campaign_id'];
			return $this->redirect(array('controller' => 'Adverts', 'action' => 'index', $campaign_id));
		}
		return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
	}
}
