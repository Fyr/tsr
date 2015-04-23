<?
App::uses('AppModel', 'Model');
App::uses('UserAppModel', 'User.Model');
App::uses('WidgetByCategory', 'User.Model');

class Widget extends UserAppModel {
	// public $belongsTo = array('User.CampaignCategory');
	
	public $validate = array(
		'title' => array(
			'checkNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Field is mandatory'
			)
		),
		'image_size' => array(
			'checkOptions' => array(
				'rule' => array('inList', null),
				'message' => 'Incorrect field value'
			)
		),
		'image_pos' => array(
			'checkOptions' => array(
				'rule' => array('inList', null),
				'message' => 'Incorrect field value'
			)
		),
		'font_weight' => array(
			'checkOptions' => array(
				'rule' => array('inList', null),
				'message' => 'Incorrect field value'
			)
		),
		'font_family' => array(
			'checkOptions' => array(
				'rule' => array('inList', null),
				'message' => 'Incorrect field value'
			)
		),
		'inner_padding' => 'numeric',
		'rows' => 'numeric',
		'cols' => 'numeric',
		'image_margin' => 'numeric',
		'font_size' => 'numeric',
		'border_outer_size' => 'numeric',
		'border_img_size' => 'numeric',
		'bkg_color' => array(
			'checkColor' => array(
				'rule' => 'checkHexColor',
				'message' => 'Incorrect field value'
			)
		),
		'font_color' => array(
			'checkColor' => array(
				'rule' => 'checkHexColor',
				'message' => 'Incorrect field value'
			)
		),
		'border_outer_color' => array(
			'checkColor' => array(
				'rule' => 'checkHexColor',
				'message' => 'Incorrect field value'
			)
		),
		'border_img_color' => array(
			'checkColor' => array(
				'rule' => 'checkHexColor',
				'message' => 'Incorrect field value'
			)
		),
	);
	
	protected $WidgetByCategory;
	
	public function checkHexColor($check) {
		list($value) = array_values($check);
		return preg_match('|^\#[0-9a-fA-F]{6}$|', $value);
	}
	
	public function beforeValidate($options = array()) {
		$validator = $this->validator();
		$validator['image_size']['checkOptions']->rule = array('inList', array_keys(Configure::read('Widget.image_size_options')), false);
		$validator['image_pos']['checkOptions']->rule = array('inList', array_keys(Configure::read('Widget.image_pos_options')), false);
		$validator['font_weight']['checkOptions']->rule = array('inList', array_keys(Configure::read('Widget.font_weight_options')), false);
		$validator['font_family']['checkOptions']->rule = array('inList', array_keys(Configure::read('Widget.font_family_options')), false);
		return true;
	}
	
	public function afterSave($created, $options = array()) {
		if (isset($this->data['WidgetByCategory']) && isset($this->data['WidgetByCategory']['category_id'])
				&& is_array($this->data['WidgetByCategory']['category_id'])) {
			$this->loadModel('User.WidgetByCategory');
			$this->WidgetByCategory->deleteAll(array('widget_id' => $this->id));
			foreach($this->data['WidgetByCategory']['category_id'] as $cat_id) {
				$this->WidgetByCategory->clear();
				$this->WidgetByCategory->save(array('widget_id' => $this->id, 'category_id' => $cat_id));
			}
		}
	}
}