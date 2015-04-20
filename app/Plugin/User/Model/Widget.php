<?
App::uses('AppModel', 'Model');
App::uses('UserAppModel', 'User.Model');
App::uses('WidgetByCategory', 'User.Model');
class Widget extends UserAppModel {
	// public $belongsTo = array('User.CampaignCategory');
	protected $WidgetByCategory;
	
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