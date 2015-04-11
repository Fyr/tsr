<?
App::uses('AppModel', 'Model');
class CampaignStatus extends UserAppModel {
	public $useTable = false;
	
	const MODERATION = 1;
	const REJECTED = 2;
	const ACTIVE = 3;
	
	public function options() {
		$aData = array(
			self::MODERATION => __('Moderation'),
			self::REJECTED => __('Rejected'),
			self::ACTIVE => __('Active')
		);
		return $aData;
	}
}