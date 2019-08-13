<?php

class Beckin_WeightAttribute_Block_Catalog_Product_View_Attributes extends Mage_Catalog_Block_Product_View_Attributes
{	

    public function getAdditionalData(array $excludeAttr = array())
    {
        $data = array();
        $product = $this->getProduct();
        $attributes = $product->getAttributes();
        foreach ($attributes as $attribute) {

            if ($attribute->getIsVisibleOnFront() && !in_array($attribute->getAttributeCode(), $excludeAttr)) {
                $value = $attribute->getFrontend()->getValue($product);

                if (!$product->hasData($attribute->getAttributeCode())) {
                    $value = Mage::helper('catalog')->__('N/A');
                } elseif ((string)$value == '') {
                    $value = Mage::helper('catalog')->__('No');
                } elseif ($attribute->getFrontendInput() == 'price' && is_string($value)) {
                    $value = Mage::app()->getStore()->convertPrice($value, true);
                } 
                    elseif (Mage::getStoreConfig('weightattribute/settings/enable')) 
                   {
                         if ($attribute->getFrontendInput() == 'weight' && is_string($value)) {
                         $_weight = $this->htmlEscape($product->getWeight());
                         if ($_weight < 1) {
                         $value = number_format($_weight*1000,2) . " Grams";
                         } else {
                         $value = number_format($_weight,2) . " Lbs";
                         }
                         }
                  }

                if (is_string($value) && strlen($value)) {
                    $data[$attribute->getAttributeCode()] = array(
                        'label' => $attribute->getStoreLabel(),
                        'value' => $value,
                        'code'  => $attribute->getAttributeCode()
                    );
                }
            }
        }
        return $data;
    }

}