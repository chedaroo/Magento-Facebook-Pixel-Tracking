<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 11/08/2016
 * Time: 08:35
 */

class Webtise_Fbpixel_Block_Checkout extends Webtise_Fbpixel_Block_Head
{
    /**
     * Customer's quote
     *
     * @var Mage_Sales_Model_Quote
     */
    protected $_quote;

    /**
     * Webtise_Fbpixel_Block_Checkout constructor.
     * Set quote variable $_quote
     *
     */
    public function __construct()
    {
        if($quote = Mage::getSingleton('checkout/session')->getQuote()) {
            $this->_quote = $quote;
        }
        parent::__construct();
    }

    /**
     * Return Bool on whether we can show checkout initiation tracking
     *
     * @return bool
     */
    public function canShowCheckout()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_initiate_checkout') && $this->_quote) {
            return true;
        }
        return false;
    }

    /**
     * Return all visible items if quote is set
     *
     * @return array|bool
     */
    public function getAllItems()
    {
        if($this->_quote) {
            return $this->_quote->getAllVisibleItems();
        }
        return false;
    }

    /**
     * Returns array of item SKUs from the quote
     *
     * @return array
     */
    public function getItemSkus()
    {
        $items = $this->getAllItems();
        $skus = array();
        foreach($items as $item) {
            $skus[] = $item->getSku();
        }
        if(count($skus) <= 1) {
            $skus = $skus[0];
        }
        return $skus;
    }

    /**
     * Return count of visible items in quote
     *
     * @return int
     */
    public function getItemCount()
    {
        return count($this->getAllItems());
    }

    /**
     * Return Grand Total fomr quote
     *
     * @return bool|float
     */
    public function getQuotePrice()
    {
        if($this->_quote) {
            return $this->_quote->getGrandTotal();
        }
        return false;
    }
}