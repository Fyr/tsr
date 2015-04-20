<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('WidgetCategory', 'User.Model');
class AdminWidgetCategoriesController extends AdminObjectTypeController {
    public $name = 'AdminWidgetCategories';
    public $uses = array('User.WidgetCategory');
    
    protected $objectType = 'WidgetCategory';
}
