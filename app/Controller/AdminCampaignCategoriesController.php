<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
class AdminCampaignCategoriesController extends AdminObjectTypeController {
    public $name = 'AdminCampaignCategories';
    
    protected $objectType = 'CampaignCategory';
}
