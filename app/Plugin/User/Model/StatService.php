<?
App::uses('AppModel', 'Model');
App::uses('UserAppModel', 'User.Model');
class StatService extends UserAppModel {
	public $useTable = false;
	
	const GOOGLE = 1;
	const LIVEINET = 2;
	const YANDEX = 3;
	
	public function options() {
		$aData = array(
			self::GOOGLE => __('Google Analitics'),
			self::LIVEINET => __('LiveInternet'),
			self::YANDEX => __('Yandex.Metrika')
		);
		return $aData;
	}
}