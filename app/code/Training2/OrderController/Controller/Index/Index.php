<?php

namespace Training2\OrderController\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\App\Action\Context
     */
    protected $_context;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Magento\Framework\Json\Helper\Data
     */
    protected $_jsonHelper;

    /**
     * @var \Training2\OrderController\Helper\Data
     */
    protected $_helper;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Training2\OrderController\Helper\Data $helper
    ) {
        $this->_context = $context;
        $this->_pageFactory = $pageFactory;
        $this->_jsonHelper = $jsonHelper;
        $this->_helper = $helper;

        parent::__construct($context);
    }

    public function execute()
    {
        $orderId = $this->getRequest()->getParam('orderId');

        if ($orderId) {
            $order['response'] = $this->_helper->getOrder($orderId);
        } else {
            $order = array('response' => 'error');
        }

        return $this->getResponse()->representJson($this->_jsonHelper->jsonEncode($order));
    }
}
