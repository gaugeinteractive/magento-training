<?php
namespace Training2\OrderController\Helper;

use Magento\Framework\App as App;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $_orderFactory;

    public function __construct(
        App\Helper\Context $context,
        \Magento\Sales\Model\OrderFactory $orderFactory
    ) {
        $this->_orderFactory = $orderFactory;
        parent::__construct($context);
    }

    public function getOrder($orderId)
    {
        $orderData = array();
        $order = $this->_orderFactory->create()->load($orderId);

        if ($order->getId()) {
            $orderData['status'] = $order->getStatus();
            $orderData['total'] = $order->getGrandTotal();
            $orderData['status'] = $order->getStatus();

            foreach ($order->getAllVisibleItems() as $orderItem) {
                $orderData['items'][$orderItem->getProductId()]['sku'] = $orderItem->getSku();
                $orderData['items'][$orderItem->getProductId()]['item_id'] = $orderItem->getProductId();
                $orderData['items'][$orderItem->getProductId()]['qty_ordered'] = $orderItem->getQtyOrdered();
                $orderData['items'][$orderItem->getProductId()]['price'] = $orderItem->getPrice();
            }

            $orderData['total_invoiced'] = $order->getTotalInvoiced();
        }

        return $orderData;
    }
}
