<?php
App::uses('AppController', 'Controller');
class UserAppController extends AppController {
	public $layout = 'userarea';

	protected function applyFilters($conditions) {
		if ($filters = $this->request->query('data')) {
			foreach($filters as $id => $val) {
				if ($val) {
					$conditions[$id] = $val;
				}
			}
		}
		return $conditions;
	}
}