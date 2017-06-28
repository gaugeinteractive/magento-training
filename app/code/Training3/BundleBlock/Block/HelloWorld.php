<?php

namespace Training3\BundleBlock\Block;

class HelloWorld extends \Magento\Framework\View\Element\Template {
    public function printHello() {
        return "Hello World";
    }
}