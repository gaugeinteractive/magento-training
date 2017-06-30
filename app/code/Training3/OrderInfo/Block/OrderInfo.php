<?php 

namespace Training3\OrderInfo\Block;

class OrderInfo extends \Magento\Framework\View\Element\Template {

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Training3\OrderInfo\Helper\Data $helper
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Training3\OrderInfo\Helper\Data $helper,
        array $data = []
    ) {
        $this->_helper = $helper;

        parent::__construct($context, $data);
    }

    public function getOrderId()
    {
        return $this->_helper->getOrderId();
    }

    public function getOrder()
    {
        return $this->_helper->getOrder($this->_helper->getOrderId());
    }
}