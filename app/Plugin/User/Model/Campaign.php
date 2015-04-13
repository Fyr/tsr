<?
App::uses('AppModel', 'Model');
App::uses('UserAppModel', 'User.Model');
class Campaign extends UserAppModel {
	// public $belongsTo = array('User.CampaignCategory');
	
	public function options($conditions = array()) {
		$fields = array('id', 'domain');
		return $this->find('list', compact('fields', 'conditions'));
	}
}