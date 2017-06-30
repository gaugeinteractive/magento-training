<?php

namespace Training1\FreeGeoIp\Observer;

use Magento\Framework\Event\Observer as FrameworkObserver;
use Magento\Framework\Event\ObserverInterface;

class CountryLog implements ObserverInterface
{
    protected $_logger;
    protected $_remoteAddress;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remoteAddress
    ) {
        $this->_logger = $logger;
        $this->_remoteAddress = $remoteAddress;
    }

    public function execute(FrameworkObserver $observer) {
        $ip = $this->_remoteAddress->getRemoteAddress();
        // Makes API call to freegeoip
        $pageContent = file_get_contents('http://freegeoip.net/json/' . $ip);
        $parsedJson  = json_decode($pageContent);
        $country = htmlspecialchars($parsedJson->country_name);

        // Logs country to Magento_Root/var/log/debug.log
        $this->_logger->debug($country);
    }
}
