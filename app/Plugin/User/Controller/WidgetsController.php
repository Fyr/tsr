<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('WidgetStatus', 'User.Model');
class WidgetsController extends UserAppController {
	public $name = 'Widgets';
	public $uses = array('User.Campaign', 'User.WidgetStatus', 'User.Widget', 'User.WidgetCategory', 'User.WidgetByCategory');
	
	public function index($campaign_id) {
		if (!$this->Campaign->isAvail($campaign_id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			return $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
		}
		
		$conditions = array('campaign_id' => $campaign_id);
		$conditions = $this->applyFilters($conditions);
		$order = 'created DESC';
		$this->set('aWidgets', $this->Widget->find('all', compact('conditions', 'order')));
		$this->set('aStatusOptions', $this->WidgetStatus->options());
		$this->set('campaign', $this->Campaign->findById($campaign_id));
	}

	public function edit($id = 0, $campaign_id = 0) {
		$lAccess = true;
		if ($campaign_id && !$this->Campaign->isAvail($campaign_id, $this->currUserID)) {
			$lAccess = false;
		} elseif ($id && !$this->Widget->isAvail($id, $this->currUserID)) {
			$lAccess = false;
		}
		if (!$lAccess) {
			$this->setFlash(__('You have no access'), 'error');
			return $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
		}
		
		$widget = ($id) ? $this->Widget->findById($id) : array();
		if ($widget) {
			$campaign_id = $widget['Widget']['campaign_id'];
		}
		
		if (!$id && !$campaign_id) {
			$errMsg = 'Incorrect URL';
			$this->setFlash($errMsg, 'error');
			$this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
			return;
		}
		
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Widget.campaign_id', $campaign_id);
			$this->request->data('Widget.status', WidgetStatus::MODERATION);
			if ($this->Widget->save($this->request->data)) {
				$this->setFlash(__('Your widget has been saved'), 'success');
				return $this->redirect(array('controller' => 'Widgets', 'action' => 'index', $this->request->data('Widget.campaign_id')));
			} else {
				$this->setFlash(__('Form could not be saved! Please, check errors'), 'error');
			}
		} else {
			$this->request->data = $widget;
		}
		
		$this->set('campaign', $this->Campaign->findById($campaign_id));
		$this->set('aCategoryOptions', $this->WidgetCategory->getObjectOptions());
		$this->set('widgetsByCat', $this->WidgetByCategory->getCategories($id));
	}
	
	public function delete($id) {
		if (!$this->Widget->isAvail($id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			return $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
		}
		
		$rec = $this->Widget->findById($id);
		if ($rec) {
			$campaign_id = $rec['Widget']['campaign_id'];
			$this->Widget->delete($id);
			$this->setFlash(__('Your Widget has been deleted'));
			return $this->redirect(array('controller' => 'Widgets', 'action' => 'index', $campaign_id));
		}
		return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
	}
	
	public function block($id, $blocked) {
		if (!$this->Widget->isAvail($id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			return $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
		}
		
		$rec = $this->Widget->findById($id);
		if ($rec) {
			if ($blocked && $rec['Widget']['status'] == WidgetStatus::ACTIVE) {
				$this->Widget->save(array('id' => $id, 'status' => WidgetStatus::BLOCKED));
				$this->setFlash(__('Your widget has been blocked'));
			} else if (!$blocked && $rec['Widget']['status'] == WidgetStatus::BLOCKED) {
				$this->Widget->save(array('id' => $id, 'status' => WidgetStatus::ACTIVE));
				$this->setFlash(__('Your widget has been activated'));
			}
			$campaign_id = $rec['Widget']['campaign_id'];
			return $this->redirect(array('controller' => 'Widgets', 'action' => 'index', $campaign_id));
		}
		return $this->redirect(array('controller' => 'Campaigns', 'action' => 'index'));
	}
	
	public function stats($id) {
		if (!$this->Widget->isAvail($id, $this->currUserID)) {
			$this->setFlash(__('You have no access'), 'error');
			return $this->redirect(array('controller' => 'Dashboard', 'action' => 'index'));
		}
		
		$rec = $this->Widget->findById($id);
		
		$this->set('aStats', array());
		$this->set('campaign', $this->Campaign->findById($rec['Widget']['campaign_id']));
	}
}
