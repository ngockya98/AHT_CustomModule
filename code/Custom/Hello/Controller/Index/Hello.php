<?php 
namespace Custom\Hello\Controller\Index;

class Hello extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_helperData;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Custom\Hello\Helper\Data $helperData)
	{
		$this->_helperData = $helperData;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		// echo $this->_helperData->getGeneralConfig('title');
		// echo $this->_helperData->getGeneralConfig('content');
		// echo $this->_helperData->getGeneralConfig('image');
		// exit;
		 return $this->_pageFactory->create();
	}
}
