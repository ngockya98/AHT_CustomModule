<?php 

namespace Custom\AutoEnableProduct\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\InventorySalesAdminUi\Model\GetSalableQuantityDataBySku;


class AutoEnableProduct implements ObserverInterface
{
	protected $_logger;
	protected $_productFactory;
	protected $_getSalableQuantityDataBySku;

	public function __construct(
		\Psr\Log\LoggerInterface $logger,
    	ProductFactory $productFactory,
    	GetSalableQuantityDataBySku $getSalableQuantityDataBySku)
	{
		$this->_logger = $logger;
		$this->_productFactory = $productFactory;
		$this->_getSalableQuantityDataBySku = $getSalableQuantityDataBySku;
	}

	public function getQty($id)
	{
		$product = $this->_productFactory->create()->load($id)->getStoreId(0);
		$sku = $product->getSku();
		$salable = $this->getSalableQuantityDataBySku->execute($sku);
  		return $salable[0]['qty'];
	}

	public function execute(\Magento\Framework\Event\Observer $observer)
	{
    	//get oder id
    	$oder = $observer->getEvent()->getOrder();
    	$oder_id = $oder->getIncrementId();
    	$this->_logger->info($oder_id);

	}
}
