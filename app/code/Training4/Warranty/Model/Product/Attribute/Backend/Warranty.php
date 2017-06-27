<?php

namespace Training4\Warranty\Model\Product\Attribute\Backend;

class Warranty extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend {


    public function afterSave($object)
    {
        $attribute = $this->getAttribute();
        $attributeCode = $attribute->getAttributeCode();
        $value = $object->getData($attributeCode);

        // If year doesn't exist, append it
        if (strpos($value, 'year') === false) {
            $object->setData($attributeCode, $value .= ' year');
        }

        return $this;
    }
}