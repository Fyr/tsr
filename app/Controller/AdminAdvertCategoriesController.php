<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('AdvertCategory', 'User.Model');
class AdminAdvertCategoriesController extends AdminObjectTypeController {
    public $name = 'AdminCampaignCategories';
    public $uses = array('User.AdvertCategory');
    
    protected $objectType = 'AdvertCategory';
}
