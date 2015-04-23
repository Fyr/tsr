<?
App::uses('AppModel', 'Model');
App::uses('Media', 'Media.Model');
App::uses('UserAppModel', 'User.Model');

define('ADVERT_MAX_TITLE_LEN', Configure::read('Advert.maxTitleLen'));
define('ADVERT_MAX_DESCR_LEN', Configure::read('Advert.maxDescrLen'));
define('ADVERT_CHK_LEN_TITLE', __('Length of this field must be between %s and %s characters', 3, ADVERT_MAX_TITLE_LEN));
define('ADVERT_CHK_LEN_DESCR', __('Length of this field must be between %s and %s characters', 3, ADVERT_MAX_DESCR_LEN));

class Advert extends UserAppModel {
	// public $belongsTo = array('User.CampaignCategory');
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
}