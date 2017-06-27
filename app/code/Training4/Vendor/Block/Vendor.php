<?php

namespace Training4\Vendor\Block;

class Vendor extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Block\Product\View $product
     * @param \Training4\Vendor\Model\Vendor $vendor
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Block\Product\View $product,
        \Magento\Framework\Registry $coreRegistry,
        \Training4\Vendor\Model\Vendor $vendor,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->product = $product;
        $this->_coreRegistry = $coreRegistry;
        $this->vendor = $vendor;
    }

    public function getProduct()
    {
        return $this->product->getProduct();
    }

    public function getVendors()
    {
        return $this->vendor->getCollection()->addFieldToSelect('name')->addProductIdFilter($this->getProduct()->getId());
    }

    public function getVendor()
    {
        return $this->_coreRegistry->registry('vendor');
    }
}