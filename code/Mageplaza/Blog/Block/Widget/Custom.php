<?php

namespace Mageplaza\Blog\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Mageplaza\Blog\Block\Frontend;
use Mageplaza\Blog\Helper\Data;


/**
 * Class Posts
 * @package Mageplaza\Blog\Block\Widget
 */
class Custom extends Frontend implements BlockInterface
{
    protected $_template = "widget/custom.phtml";

    public function getCollection()
    {
        if ($this->hasData('show_type') && $this->getData('show_type') === 'category') {
            $collection = $this->helperData->getObjectByParam($this->getData('category_id'), null, Data::TYPE_CATEGORY)
            ->getSelectedPostsCollection();
            $this->helperData->addStoreFilter($collection);
        } else {
            $collection = $this->helperData->getPostList();
        }

        $collection->setPageSize($this->getData('post_count'));

        return $collection;
    }

    public function getHelperData()
    {
        return $this->helperData;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->getData('title');
    }

    /**
     * @param $code
     *
     * @return string
     */
    public function getBlogUrl($code)
    {
        return $this->helperData->getBlogUrl($code);
    }
}
