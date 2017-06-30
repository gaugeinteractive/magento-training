<?php

namespace Training4\VendorList\Block\Vendor;

class VendorList extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Training4\VendorList\Model\Vendor $vendor
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Training4\VendorList\Model\Vendor $vendor,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->vendor = $vendor;
    }

    public function getAllVendors()
    {
        $filter = $this->getChildBlock('training4.vendor.list.filter');
        if (!$filter->getFilterOrder()) {
            return $this->vendor->getCollection()->addFieldToSelect('*');
        }
        return $this->vendor->getCollection()->addFieldToSelect('*')->setOrder('name', $filter->getFilterOrder());
    }

    public function getVendorUrl($id)
    {
        return $this->getUrl('*/*/view', ['id' => $id]);
    }
}