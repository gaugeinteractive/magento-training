<?php

namespace Training4\VendorRepository\Model;

class Vendor extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('\Training4\VendorRepository\Model\ResourceModel\Vendor');
    }
}