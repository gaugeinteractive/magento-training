<?php

namespace Training3\ExchangeRate\Block;

class ExchangeRate extends \Magento\Framework\View\Element\Template {
   
    public function getRate($currency) {
        $pageContent = file_get_contents('http://api.fixer.io/latest?base=USD&symbols=' . $currency);
        $parsedJson  = json_decode($pageContent);
        $exchangeRate = htmlspecialchars($parsedJson->rates->$currency);

        return $exchangeRate;
    }
}
