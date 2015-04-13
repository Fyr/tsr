<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('InformerCategory', 'User.Model');
class AdminInformerCategoriesController extends AdminObjectTypeController {
    public $name = 'AdminInformerCategories';
    public $uses = array('User.InformerCategory');
    
    protected $objectType = 'InformerCategory';
}
