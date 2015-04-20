<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('SiteCategory', 'User.Model');
class AdminSiteCategoriesController extends AdminObjectTypeController {
    public $name = 'AdminSiteCategories';
    public $uses = array('User.SiteCategory');
    
    protected $objectType = 'SiteCategory';
}
