<?php

namespace Training4\Vendor\Controller\Index;

class View extends \Magento\Framework\App\Action\Action
{

    /**
     * @param \Magento\Framework\App\Action\Context $context,
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory,
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->_resultPageFactory = $pageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    public function execute()
    {
        $vendorId = $this->getRequest()->getParam('id');
        $vendor = $this->_objectManager->create('\Training4\Vendor\Model\Vendor')->load($vendorId);
        $this->_coreRegistry->register('vendor', $vendor);
        $resultsPage = $this->_resultPageFactory->create();
        $resultsPage->getConfig()->getTitle()->set($vendor->getName());
        return $resultsPage;
    }
}