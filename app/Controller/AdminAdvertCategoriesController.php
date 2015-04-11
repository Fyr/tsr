<?php
App::uses('AdminController', 'Controller');
App::uses('AdminObjectTypeController', 'Controller');
class AdminAdvertCategoriesController extends AdminObjectTypeController {
    public $name = 'AdminCampaignCategories';
    
    protected $objectType = 'AdvertCategory';
}
