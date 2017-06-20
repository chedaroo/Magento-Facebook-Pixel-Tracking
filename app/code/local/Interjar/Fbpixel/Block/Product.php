<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 09/08/2016
 * Time: 15:13
 */

class Interjar_Fbpixel_Block_Product extends Interjar_Fbpixel_Block_Head
{
    /**
     * @var Mage_Catalog_Model_Product
     */
    protected $_product;

    /**
     * Interjar_Fbpixel_Block_Viewcontent_Product constructor.
     * Set product using registry object
     */
    public function __construct()
    {
        if(Mage::registry('current_product')) {
            $this->_product = Mage::registry('current_product');
        }
        parent::__construct();
    }

    /**
     * Return boolean based on view content setting
     *
     * @return bool
     */
    public function showViewContent()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_view_content')) {
            return true;
        }
        return false;
    }

    /**
     * Return boolean based on view content setting
     *
     * @return bool
     */
    public function showAddToCart()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_add_to_cart') && Mage::getSingleton('core/session')->getProductAddedToCartFlag(true)) {
            $this->_product = Mage::getSingleton('checkout/session')->getQuote()->getItemsCollection()->getLastItem()->getProduct();
            return true;
        }
        return false;
    }

    /**
     * Return Product Name
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->_product->getName();
    }

    /**
     * Return Product Sku
     *
     * @return string
     */
    public function getProductSku()
    {
        return $this->_product->getSku();
    }

    /**
     * Return Product Final Price
     *
     * @return string
     */
    public function getProductPrice()
    {
        return $this->_product->getFinalPrice();
    }

}