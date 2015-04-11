<?
App::uses('AppModel', 'Model');
class Campaign extends UserAppModel {
	// public $belongsTo = array('User.CampaignCategory');
	
	public function options($conditions = array()) {
		$fields = array('id', 'domain');
		return $this->find('list', compact('fields', 'conditions'));
	}
}