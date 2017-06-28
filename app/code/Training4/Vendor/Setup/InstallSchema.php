<?php

namespace Training4\Vendor\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        
        $installer = $setup;
        $installer->startSetup();

        /*
        * Create table training4_vendor
        */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('training4_vendor'))
            ->addColumn('entity_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true,
            ], 'Vendor Id')
            ->addColumn('name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable' => false
            ], 'Vendor Name')
            ->setComment('Training4 Vendor Entity');
        $installer->getConnection()->createTable($table);

        /*
        * Create table training4_vendor2product
        */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('training4_vendor2product'))
            ->addColumn('link_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true,
            ], 'Vendor Product Link Id')
            ->addColumn('vendor_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'nullable' => false,
                'unsigned' => true
            ], 'Vendor Id')
            ->addColumn('product_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'nullable' => false,
                'unsigned' => true
            ], 'Product Id')
            ->addForeignKey(
                $installer->getFkName(
                    'training4_vendor2product', 'vendor_id',
                    'training4_vendor', 'entity_id'),
                'vendor_id',
                $installer->getTable('training4_vendor'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )->addForeignKey(
                $installer->getFkName(
                    'training4_vendor2product', 'product_id',
                    'catalog_product_entity', 'entity_id'),
                'product_id',
                $installer->getTable('catalog_product_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}