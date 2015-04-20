<?php
App::uses('AppController', 'Controller');
App::uses('UserAppController', 'User.Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('WidgetStatus', 'User.Model');
class WidgetsController extends UserAppController {
	public $name = 'Widgets';
	public $uses = array('User.Campaign', 'User.WidgetStatus', 'User.Widget', 'User.WidgetCategory', 'User.WidgetByCategory');
	
	public function index($campaign_id) {
		$conditions = array('campaign_id' => $campaign_id);
		
		$conditions = $this->applyFilters($conditions);
		
		$order = 'created DESC';
		$this->set('aWidgets', $this->Widget->find('all', compact('conditions', 'order')));
		$this->set('aStatusOptions', $this->WidgetStatus->options());
		$this->set('campaign', $this->Campaign->findById($campaign_id));
	}

	public function edit($id = 0, $campaign_id = 0) {
		if ($this->request->is(array('put', 'post'))) {
			$this->request->data('Widget.status', WidgetStatus::MODERATION);
			if ($this->Widget->save($this->request->data)) {
				$this->setFlash(__('Your widget has been saved'), 'success');
				return $this->redirect(array('controller' => 'Widgets', 'action' => 'index', $this->request->data('Widget.campaign_id')));
			}
		} else {
			$this->request->data = $this->Widget->findById($id);
		}
		
		if ($campaign_id) {
			$this->request->data('Widget.campaign_id', $campaign_id);
		}
		
		$this->set('campaign', $this->Campaign->findById($this->request->data('Widget.campaign_id')));
		$this->set('aCategoryOptions', $this->WidgetCategory->getObjectOptions());
		$this->set('widgetsByCat', $this->WidgetByCategory->getCategories($id));
	}
	
	public function delete($id) {
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
		$rec = $this->Widget->findById($id);
		
		$this->set('aStats', array());
		$this->set('campaign', $this->Campaign->findById($rec['Widget']['campaign_id']));
	}
}
