<?
App::uses('AppModel', 'Model');
App::uses('Media', 'Media.Model');
App::uses('UserAppModel', 'User.Model');
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
}