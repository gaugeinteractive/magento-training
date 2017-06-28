<?php

namespace Training4\Warranty\Setup;

class UpgradeData implements \Magento\Framework\Setup\UpgradeDataInterface {

    /**
    * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
    */
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->_eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(
        \Magento\Framework\Setup\ModuleDataSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);
            // Moving it from the General group to the Content group to verify upgrade ran
            $eavSetup->addAttributeToSet(\Magento\Catalog\Model\Product::ENTITY, 11, 'Content', 'warranty');
        }
        $setup->endSetup();
    }
}