<?php

namespace Training4\Vendor\Setup;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    public function install(
        \Magento\Framework\Setup\ModuleDataSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {

        $installer = $setup;

        $names = array(
            array('name' => 'Vendor1'),
            array('name' => 'Vendor2')
        );
        
        /*
        * Insert vendor names into training4_vendor
        */
        foreach($names as $name) {
            $installer->getConnection()->insertForce($installer->getTable('training4_vendor'), $name);
        }

        /* Products already created in database */
        $vendorProductLink = array(
            array('vendor_id' => 1, 'product_id' => 1),
            array('vendor_id' => 2, 'product_id' => 1),
            array('vendor_id' => 2, 'product_id' => 2),
            array('vendor_id' => 2, 'product_id' => 3)
        );

        /*
        * Insert vendor vendor id and product id into training4_vendor2product
        */
        foreach($vendorProductLink as $link) {
            $installer->getConnection()->insertForce($installer->getTable('training4_vendor2product'), $link);
        }
    }
}