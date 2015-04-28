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
		fdebug(array($id, $this->Advert->isAvail($id, $this->currUserID)));
		if ($campaign_id && !$this->Campaign->isAvail($campaign_id, $this->currUserID)) {
			$lAccess = false;
		} elseif ($id && !$this->Advert->isAvail($id, $this->currUserID)) {
			$lAccess = false;
		}
		if (!$lAccess) {
			$errMsg = __('You have no access');
			if ($this->request->is('ajax')) {
				$this->_response = array('status' => 'ERROR', 'errMsg' => $errMsg);
			} else {
				$this->setFlash($errMsg, 'error');
				$this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
			}
			return;
		}
		
		$advert = ($id) ? $this->Advert->findById($id) : array();
		if ($advert) {
			$campaign_id = $advert['Advert']['campaign_id'];
		}
		
		if (!$id && !$campaign_id) {
			$errMsg = 'Incorrect URL';
			if ($this->request->is('ajax')) {
				$this->_response = array('status' => 'ERROR', 'errMsg' => $errMsg);
			} else {
				$this->setFlash($errMsg, 'error');
				$this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
			}
			return;
		}
		
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Advert.status', AdvertStatus::MODERATION);
			if ($id) {
				$this->request->data('Advert.id', $id);
				$this->request->data('Advert.campaign_id', $advert['Advert']['campaign_id']);
			} else {
				$this->request->data('Advert.campaign_id', $campaign_id);
			}
			
			if ($this->Advert->save($this->request->data)) {
				if (!$id) {
					$id = $this->Advert->id;
				}
				
				$media = $this->Media->getObject('Advert', $id);
				$crop = $this->request->data('AdvertMedia.crop');
				if ($imgURL = $this->request->data('Advert.img_url')) {
					// remove prev.image
					if ($media) {
						$this->Media->delete($media['Media']['id']);
					}
					
					// upload new image from URL
					$path = pathinfo($imgURL);
					$data = array(
						'media_type' => 'image',
						'object_type' => 'Advert',
						'object_id' => $id,
						'real_name' => $imgURL,
						'file' => 'image',
						'ext' => '.'.$path['extension'],
						'orig_fname' => $path['basename']
					);
					if ($crop = $this->request->data('AdvertMedia.crop')) {
						$data['crop'] = $crop;
					}
					$this->Media->uploadMedia($data);
				} elseif ($media && $crop) {
					$this->Media->recrop($media['Media']['id'], $crop);
				}
				
				$this->setFlash(__('Your advert has been saved'), 'success');
				if ($this->request->is('ajax')) {
					$advert = $this->Advert->findById($id);
					$this->_response = array('status' => 'OK', 'data' => $advert['Advert']);
					return;
				}
				return $this->redirect(array('controller' => 'Adverts', 'action' => 'index', $this->request->data('Advert.campaign_id')));
			} else {
				$errMsg = __('Form could not be saved! Please, check errors');
				if ($this->request->is('ajax')) {
					$this->_response = array('status' => 'ERROR', 'errMsg' => $errMsg, 'invalidFields' => $this->Advert->invalidFields());
				} else {
					$this->setFlash($errMsg, 'error');
				}
			}
		} else {
			$this->request->data = $advert;
		}
		
		$this->set('campaign', $this->Campaign->findById($campaign_id));
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
