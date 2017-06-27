<?php

namespace Training4\Vendor\Block\Vendor;

class View extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Catalog\Model\Product $product
     * @param \Training4\Vendor\Model\Vendor $vendor
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Catalog\Model\Product $product,
        \Training4\Vendor\Model\Vendor $vendor,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_coreRegistry = $coreRegistry;
        $this->product = $product;
        $this->vendor = $vendor;
    }

    public function getVendor()
    {
        return $this->_coreRegistry->registry('vendor');
    }

    public function getVendorProductIds()
    {
        return $this->vendor->getCollection()->addFieldToSelect('*')->addVendorIdFilter($this->getVendor()->getId());
    }

    public function getProduct($id)
    {
        return $this->product->load($id);
    }
}