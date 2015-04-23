<?
App::uses('AppModel', 'Model');
App::uses('UserAppModel', 'User.Model');
class Domain extends UserAppModel {
	// public $belongsTo = array('User.CampaignCategory');
	public $validate = array(
		'domain' => array(
			'checkNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Field is mandatory',
			),
			'checkIsUnique' => array(
				'rule' => 'isUnique',
				'message' => 'This domain is already used'
			),
			'isUrl' => array( 
				'rule' => 'url',
				'allowEmpty' => false, 
				'message' => 'Invalid domain URL'
			) 
		),
		'stat_url' => array(
			'isUrl' => array( 
				'rule' => 'url',
				'allowEmpty' => true, 
				'message' => 'Invalid domain URL'
			) 
		),
	);
	
	public function beforeSave() {
		if (isset($this->data['Domain']['domain'])) {
			$this->data['Domain']['domain'] = $this->stripUrl($this->data['Domain']['domain']);
		}
		if (isset($this->data['Domain']['stat_url'])) {
			$this->data['Domain']['stat_url'] = $this->stripUrl($this->data['Domain']['stat_url']);
		}
	}
	
	protected function stripUrl($url) {
		return str_replace(array('http://', 'https://', '/'), '', $url);
	}
	
	public function options($conditions = array()) {
		$conditions = array_merge(array('user_id' => AuthComponent::user('id')), $conditions);
		$fields = array('id', 'domain');
		return $this->find('list', compact('fields', 'conditions'));
	}
}