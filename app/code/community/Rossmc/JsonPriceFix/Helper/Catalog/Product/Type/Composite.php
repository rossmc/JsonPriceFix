<?php
/**
 * Helper for preparing properties for configurable product
 *
 * @category   Mage
 * @package    Mage_Catalog
 */
class Rossmc_JsonPriceFix_Helper_Catalog_Product_Type_Composite extends Mage_Catalog_Helper_Product_Type_Composite
{
	 /**
     * Prepare general params for product to be used in getJsonConfig()
     * @see Mage_Catalog_Block_Product_View::getJsonConfig()
     * @see Mage_ConfigurableSwatches_Block_Catalog_Product_List_Price::getJsonConfig()
     *
     * @return array
     */
    public function prepareJsonGeneralConfig()
    {
        return array(
            'priceFormat'       => Mage::app()->getLocale()->getJsPriceFormat(),
            'includeTax'        => Mage::helper('tax')->priceIncludesTax() ? 'true' : 'false',
            'showIncludeTax'    => Mage::helper('tax')->displayPriceIncludingTax(),
            'showBothPrices'    => Mage::helper('tax')->displayBothPrices(),
            'idSuffix'            => '_clone', // Added this _clone value as it missing in Magento CE 1.9.3
            'oldPlusDisposition'  => 0,
            'plusDisposition'     => 0,
            'plusDispositionTax'  => 0,
            'oldMinusDisposition' => 0,
            'minusDisposition'    => 0,
        );
    }
}
		