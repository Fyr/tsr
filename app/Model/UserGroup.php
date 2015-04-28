<?php
App::uses('AppModel', 'Model');
class UserGroup extends AppModel {
	public $useTable = false;
	
	const ADMIN = 1;
	const PUBLISHER = 2;
	const EDITOR = 3;
	const MODERATOR = 4;
	
	public function options() {
		$aData = array(
			self::ADMIN => __('Administrator'),
			self::PUBLISHER => __('Publisher'),
			self::EDITOR => __('Editor'),
			self::MODERATOR => __('Moderator')
		);
		return $aData;
	}
	
	public function hasAdminAccess($currGroup) {
		return (in_array($currGroup, array(UserGroup::ADMIN, UserGroup::EDITOR, UserGroup::MODERATOR)));
	}
}
