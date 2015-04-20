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
                'SiteCategory' => __('Site categories'),
                'Advert' => __('Adverts'),
                'AdvertCategory' => __('Advert categories'),
                'WidgetCategory' => __('Widget categories'),
                'Widget' => __('Widgets'),
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
                'SiteCategory' => __('Create category'),
                'Advert' => __('Create advert'),
                'AdvertCategory' => __('Create category'),
                'WidgetCategory' => __('Create category'),
                'Widget' => __('Create widget'),
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
                'SiteCategory' => __('Edit category'),
                'Advert' => __('Edit advert'),
                'AdvertCategory' => __('Edit category'),
                'WidgetCategory' => __('Edit category'),
                'Widget' => __('Widget settings'),
            ),
            'view' => array(
            	'Article' => __('View Article'),
            	'News' => __('View News article'),
            ),
            'stats' => array(
            	'Campaign' => __('Campaign statistics'),
            	'Widget' => __('Widget statistics'),
            ),
            'block' => array(
            	'Advert' => __('Stop this advert'),
            	'Widget' => __('Stop this widget')
            ),
            'unblock' => array(
            	'Advert' => __('Activate this advert'),
            	'Widget' => __('Activate this widget')
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