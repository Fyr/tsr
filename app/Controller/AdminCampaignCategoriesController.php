<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
App::uses('UserAppModel', 'User.Model');
App::uses('CampaignCategory', 'User.Model');
class AdminCampaignCategoriesController extends AdminObjectTypeController {
    public $name = 'AdminCampaignCategories';
    public $uses = array('User.CampaignCategory');
    
    protected $objectType = 'CampaignCategory';
}
