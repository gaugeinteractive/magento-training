<?php
namespace Training3\OrderInfo\Controller\Index;

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
     * @var \Training3\OrderInfo\Helper\Data
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
        \Training3\OrderInfo\Helper\Data $helper
    ) {
        $this->_context = $context;
        $this->_pageFactory = $pageFactory;
        $this->_jsonHelper = $jsonHelper;
        $this->_helper = $helper;

        parent::__construct($context);
    }

    public function getJsonParameter()
    {
        return $this->getRequest()->getParam('json');
    }

    public function getOrderId()
    {
        return $this->getRequest()->getParam('orderId');
    }

    public function execute()
    {
        $orderId = $this->getOrderId();
        if ($orderId) {
            $order['response'] = $this->_helper->getOrder($orderId);
        } else {
            $order = array('response' => 'error');
        }

        // If json parmeter = 1, show json
        if ($this->getJsonParameter() == '1') {
            return $this->getResponse()->representJson($this->_jsonHelper->jsonEncode($order));
        }

        return $this->_pageFactory->create();
    }
}
