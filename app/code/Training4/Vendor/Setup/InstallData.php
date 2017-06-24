<?php

namespace Training4\Vendor\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {

        $installer = $setup;

        $names = [
            ['name' => 'Vendor1'],
            ['name' => 'Vendor2']
        ];
        
        /*
        * Insert vendor names into training4_vendor
        */
        foreach($names as $name) {
            $installer->getConnection()->insertForce($installer->getTable('training4_vendor'), $name);
        }

        /* Products already created in database */
        $vendorProductLink = [
            ['vendor_id' => 1, 'product_id' => 1],
            ['vendor_id' => 1, 'product_id' => 2],
            ['vendor_id' => 2, 'product_id' => 1],
            ['vendor_id' => 2, 'product_id' => 2]
        ];

        /*
        * Insert vendor vendor id and product id into training4_vendor2product
        */
        foreach($vendorProductLink as $link) {
            $installer->getConnection()->insertForce($installer->getTable('training4_vendor2product'), $link);
        }
    }
}