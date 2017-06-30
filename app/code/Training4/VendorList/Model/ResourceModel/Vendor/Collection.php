<?php

namespace Training4\VendorList\Model\ResourceModel\Vendor;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Training4\VendorList\Model\Vendor', 'Training4\VendorList\Model\ResourceModel\Vendor');
    }

    public function addProductIdFilter($productId)
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from($this->getTable('training4_vendor2product'), 'vendor_id')->where('product_id = ?', $productId);
        return $this->addFieldToFilter('entity_id', ['in' => $connection->fetchAll($select)]);
    }

    public function addVendorIdFilter($vendorId)
    {
        $connection = $this->getConnection();
        $select = $connection->select()->from($this->getTable('training4_vendor2product'), 'product_id')->where('vendor_id = ?', $vendorId);
        return $connection->fetchAll($select);
    }
}