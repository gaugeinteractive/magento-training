<?php

namespace Training4\VendorRepository\Block\Vendor;

class VendorList extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Training4\VendorRepository\Model\Vendor $vendor
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Training4\VendorRepository\Model\Vendor $vendor,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->vendor = $vendor;
    }

    public function getAllVendors()
    {
        return $this->vendor->getCollection()->addFieldToSelect('*');
    }

    public function getVendorUrl($id)
    {
        return $this->getUrl('*/*/view', ['id' => $id]);
    }
}