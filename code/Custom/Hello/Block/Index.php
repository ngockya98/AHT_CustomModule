<?php
namespace Custom\Hello\Block;

class Index extends \Magento\Framework\View\Element\Template
{
	protected $_helperData;
	protected $_currentStore;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
								\Custom\Hello\Helper\Data $helperData)
	{
		$this->_helperData = $helperData;

		$_objectManager = \Magento\Framework\App\ObjectManager::getInstance(); //instance of\Magento\Framework\App\ObjectManager
		$storeManager = $_objectManager->get('Magento\Store\Model\StoreManagerInterface'); 
		$this->_currentStore = $storeManager->getStore();
		parent::__construct($context);
	}

	public function getTitle()
	{
		return $this->_helperData->getGeneralConfig('title');
	}

	public function getContent()
	{
		return $this->_helperData->getGeneralConfig('content');
	}

	public function getMediaUrl()
	{
		return $mediaUrl = $this->_currentStore->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
	}

	public function getImage()
	{
		$url = $this->getMediaUrl();
		return $url . 'test';
	}

	public function getInfo()
	{
		return __('Hello World');
	}
}

