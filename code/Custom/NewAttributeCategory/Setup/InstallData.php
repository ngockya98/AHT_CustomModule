<?php
namespace Custom\NewAttributeCategory\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class InstallData implements InstallDataInterface
{
	private $_eavSetupFactory;
    protected $categorySetupFactory;

	public function __construct(
		EavSetupFactory $eavSetupFactory,
		\Magento\Catalog\Setup\CategorySetupFactory $categorySetupFactory)
	{
		$this->eavSetupFactory = $eavSetupFactory;
		$this->categorySetupFactory = $categorySetupFactory;
	}

	public function install(
		ModuleDataSetupInterface $setup,
		ModuleContextInterface $context)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$setup = $this->categorySetupFactory->create(['setup' => $setup]);
		$setup->addAttribute(
			\Magento\Catalog\Model\Category::ENTITY,
			'thumbnail_image',
			[
				'type'         => 'varchar',
				'label'        => 'Thumbnail Image',
				'input'        => 'image',
				'sort_order'   => 19,
				'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
				'visible'      => true,
				'required'     => false,
				'user_defined' => false,
				'group'        => 'General Information',
				'backend'      => 'Magento\Catalog\Model\Category\Attribute\Backend\Image'
			]
		);
		$setup->addAttribute(
			\Magento\Catalog\Model\Category::ENTITY,
			'is_landing',
			[
				'type'         => 'int',
				'label'        => 'Is Landing',
				'input'        => 'boolean',
				'sort_order'   => 20,
				'source'       => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
				'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
				'visible'      => true,
				'required'     => false,
				'user_defined' => false,
				'default'      => '0',
				'group'        => 'General Information'
			]
		);
	}	
}
