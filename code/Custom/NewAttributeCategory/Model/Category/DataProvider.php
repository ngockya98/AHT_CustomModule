<?php
namespace Custom\NewAttributeCategory\Model\Category;
 
class DataProvider extends \Magento\Catalog\Model\Category\DataProvider
{
 
	protected function getFieldsMap()
	{
    	$fields = parent::getFieldsMap();
        $fields['content'][] = 'thumbnail_image'; // custom image field
    	$fields['content'][] = 'is_landing';
    	return $fields;
	}
}