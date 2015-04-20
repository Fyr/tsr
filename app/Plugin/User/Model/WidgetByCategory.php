<?
App::uses('AppModel', 'Model');
App::uses('UserAppModel', 'User.Model');
class WidgetByCategory extends UserAppModel {
	public $useTable = 'widgets_by_categories';
	
	public function getCategories($widget_id) {
		return Hash::extract($this->findAllByWidgetId($widget_id), '{n}.WidgetByCategory.category_id');
	}
}