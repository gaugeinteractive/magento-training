<?php

namespace Training4\VendorList\Block\Vendor\VendorList;

class Filter extends \Magento\Framework\View\Element\Template
{
    /**
     * Constant
     */
    const FILTER_DIRECTION = 'filter';

    protected $filterOptions = array(
        \Magento\Framework\Data\Collection::SORT_ORDER_ASC => 'A to Z',
        \Magento\Framework\Data\Collection::SORT_ORDER_DESC => 'Z to A'
    );

    /**
     * Initialize block with context and registry access
     *
     * @param Request $request
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Request\Http $request,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->_request = $request;
        parent::__construct($context, $data);
    }

    public function getFilterOrder()
    {
        return $this->_request->getParam(self::FILTER_DIRECTION);
    }

    public function getFilterOptions()
    {
        return $this->filterOptions;
    }
}