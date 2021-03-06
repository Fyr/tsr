<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
	
	const ADMIN = 1;
	const PUBLISHER = 2;
	const EDITOR = 3;
	const MODERATOR = 4;
	
	public $validate = array(
		'username' => array(
			'checkNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Field is mandatory',
			),
			'checkIsUnique' => array(
				'rule' => 'isUnique',
				'message' => 'That name has already been taken'
			)
		),
		'password' => array(
			'checkNotEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Field is mandatory'
			),
			'checkMatchPassword' => array(
				'rule' => array('matchPassword'),
				'message' => 'Your password and its confirmation do not match',
			)
		),
		'password_confirm' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Field is mandatory',
			)
		)
	);

	public function matchPassword($data){
		if($data['password'] == $this->data['User']['password_confirm']){
			return true;
		}
		$this->invalidate('password_confirm', __('Your password and its confirmation do not match'));
		return false;
	}
	
	public function beforeValidate($options = array()) {
		if (Hash::get($options, 'validate')) {
			if (!Hash::get($this->data, 'User.password')) {
				$this->validator()->remove('password');
				$this->validator()->remove('password_confirm');
			}
		}
	}

	public function beforeSave($options = array()) {
		if (isset($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}

}
