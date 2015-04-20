<?
App::uses('AppModel', 'Model');
App::uses('UserAppModel', 'User.Model');
class Domain extends UserAppModel {
	// public $belongsTo = array('User.CampaignCategory');
	
	public function options($conditions = array()) {
		$conditions = array_merge(array('user_id' => AuthComponent::user('id')), $conditions);
		$fields = array('id', 'domain');
		return $this->find('list', compact('fields', 'conditions'));
	}
}