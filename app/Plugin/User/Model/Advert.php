<?
App::uses('AppModel', 'Model');
App::uses('User', 'Model');
App::uses('UserGroup', 'Model');
App::uses('Media', 'Media.Model');
App::uses('UserAppModel', 'User.Model');
App::uses('Campaign', 'User.Model');

define('ADVERT_MAX_TITLE_LEN', Configure::read('Advert.maxTitleLen'));
define('ADVERT_MAX_DESCR_LEN', Configure::read('Advert.maxDescrLen'));
define('ADVERT_CHK_LEN_TITLE', __('Length of this field must be between %s and %s characters', 3, ADVERT_MAX_TITLE_LEN));
define('ADVERT_CHK_LEN_DESCR', __('Length of this field must be between %s and %s characters', 3, ADVERT_MAX_DESCR_LEN));

class Advert extends UserAppModel {
	// public $belongsTo = array('User.Campaign');
	public $hasOne = array(
		'AdvertMedia' => array(
			'className' => 'Media.Media',
			'foreignKey' => 'object_id',
			'conditions' => array('AdvertMedia.object_type' => 'Advert'),
			'dependent' => true
		),
	);
	
	public $validate = array(
		'title' => array(
			'titleNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Field is mandatory',
			),
			'titleChkLen' => array(
				'rule' => array('between', 3, ADVERT_MAX_TITLE_LEN),
				'message' => ADVERT_CHK_LEN_TITLE
			),
		),
		'url' => array(
			'urlNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Field is mandatory',
			),
			'isUrl' => array( 
				'rule' => 'url',
				'allowEmpty' => false, 
				'message' => 'Invalid domain URL'
			) 
		),
		'descr' => array(
			'descrNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Field is mandatory',
			),
			'descrChkLen' => array(
				'rule' => array('between', 3, ADVERT_MAX_DESCR_LEN),
				'message' => ADVERT_CHK_LEN_DESCR
			),
		),
	);
	
	protected $Campaign, $User, $UserGroup;
	
	public function isAvail($id, $user_id) {
		$this->loadModel('User');
		$this->loadModel('UserGroup');
		$user = $this->User->findById($user_id);
		if ($user && $this->UserGroup->hasAdminAccess($user['User']['user_group_id'])) {
			return true;
		}
		
		$this->loadModel('User.Campaign');
		$ids = $this->Campaign->idsAvail($user_id);
		
		$conditions = array('Advert.id' => $id, 'Advert.campaign_id' => $ids);
		return $this->find('first', compact('conditions'));
	}
}