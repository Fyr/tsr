<?php
App::uses('AppHelper', 'View/Helper');
class ObjectTypeHelper extends AppHelper {
    public $helpers = array('Html');
    
    private function _getTitles() {
        $Titles = array(
            'index' => array(
                'Article' => __('Articles'),
                'Page' => __('Static pages'),
                'News' => __('News'),
                'CategoryNews' => __('News categories'),
                'CategoryArticle' => __('Article categories'),
                'SubcategoryArticle' => __('Article subcategories'),
                'Product' => __('Products'),
                'FormField' => __('Tech.params'),
                'User' => __('Users'),
                'CategoryProduct' => __('Product categories'),
                'Product' => __('Products'),
                'Campaign' => __('Campaigns'),
                'CampaignCategory' => __('Campaign categories'),
                'Advert' => __('Adverts'),
                'AdvertCategory' => __('Advert categories'),
                'InformerCategory' => __('Informer categories'),
                'Informer' => __('Informers'),
            ), 
            'create' => array(
                'Article' => __('Create Article'),
                'Page' => __('Create Static page'),
                'News' => __('Create News article'),
                'CategoryNews' => __('Create News category'),
                'CategoryArticle' => __('Create Article category'),
                'SubcategoryArticle' => __('Create Article subcategory'),
                'Subcategory' => __('Create Subcategory'),
                'Product' => __('Create Product'),
                'FormField' => __('Create tech.param'),
                'User' => __('Create User'),
                'CategoryProduct' => __('Create Product category'),
                'Product' => __('Create Product'),
                'Campaign' => __('Create campaign'),
                'CampaignCategory' => __('Create category'),
                'Advert' => __('Create advert'),
                'AdvertCategory' => __('Create category'),
                'InformerCategory' => __('Create category'),
                'Informer' => __('Create informer'),
            ),
            'edit' => array(
                'Article' => __('Edit Article'),
                'Page' => __('Edit Static page'),
                'News' => __('Edit News article'),
                'CategoryNews' => __('Edit News category'),
                'CategoryArticle' => __('Edit Article category'),
                'SubcategoryArticle' => __('Edit Article subcategory'),
                'Subcategory' => __('Edit Subcategory'),
                'Product' => __('Edit Product'),
                'FormField' => __('Edit tech.param'),
                'User' => __('Edit User'),
                'CategoryProduct' => __('Edit Product category'),
                'Product' => __('Edit Product'),
                'Campaign' => __('Edit campaign'),
                'CampaignCategory' => __('Edit category'),
                'Advert' => __('Edit advert'),
                'AdvertCategory' => __('Edit category'),
                'InformerCategory' => __('Edit category'),
                'Informer' => __('Informer settings'),
            ),
            'view' => array(
            	'Article' => __('View Article'),
            	'News' => __('View News article'),
            ),
            'stats' => array(
            	'Campaign' => __('Campaign statistics'),
            	'Informer' => __('Informer statistics'),
            ),
            'block' => array(
            	'Advert' => __('Block this advert')
            )
        );
        return $Titles;
    }
    
    public function getTitle($action, $objectType) {
        $aTitles = $this->_getTitles();
        return (isset($aTitles[$action][$objectType])) ? $aTitles[$action][$objectType] : __(ucfirst($action).' '.$objectType);
    }
    
    public function getBaseURL($objectType, $objectID = '') {
        return $this->Html->url(array('action' => 'index', $objectType, $objectID));
    }
}