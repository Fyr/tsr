<?
App::uses('AppModel', 'Model');
App::uses('UserAppModel', 'User.Model');
App::uses('Domain', 'User.Model');
class Campaign extends UserAppModel {
	public $belongsTo = array('User.Domain');
	
	public $validate = array(
		'title' => array(
			'checkNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Field is mandatory',
			)
		),
	);
	
	public function options($conditions = array()) {
		$fields = array('id', 'title');
		return $this->find('list', compact('fields', 'conditions'));
	}
}