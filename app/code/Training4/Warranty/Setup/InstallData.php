<?php

namespace Training4\Warranty\Setup;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{

    /**
    * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    */
    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(
        \Magento\Framework\Setup\ModuleDataSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'warranty',
            [
                'type' => 'varchar',
                'label' => 'Warranty',
                'input' => 'text',
                'is_html_allowed_on_front' => true,
                'group' => 'General',
                'sort_order' => 200,
                'backend' => 'Training4\Warranty\Model\Product\Attribute\Backend\Warranty',
                'frontend' => 'Training4\Warranty\Model\Product\Attribute\Frontend\Warranty',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'required' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
            ]
        );
    }
}