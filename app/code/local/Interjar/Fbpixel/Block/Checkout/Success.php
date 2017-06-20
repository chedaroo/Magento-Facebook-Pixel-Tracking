<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 11/08/2016
 * Time: 15:10
 */

class Interjar_Fbpixel_Block_Checkout_Success extends Mage_Checkout_Block_Onepage_Success
{

    protected $_order;

    public function __construct()
    {
        if($order = $this->getLastOrder()) {
            $this->_order = $order;
        }
        parent::__construct();
    }

    public function getLastOrder()
    {
        return Mage::getSingleton('sales/order')->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId());
    }

    public function canShowPurchase()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_purchase') && $this->_order) {
            return true;
        }
        return false;
    }

    public function getOrderTotal()
    {
        if($total = $this->_order->getGrandTotal()) {
            return $total;
        }
        return false;
    }

    public function getAllItems()
    {
        if($items = $this->_order->getAllVisibleItems()) {
            return $items;
        }
        return false;
    }

    public function getItemCount()
    {
        return count($this->getAllItems());
    }

    /**
     * Returns array of item SKUs from the last order
     *
     * @return array
     */
    public function getSkus()
    {
        $items = $this->getAllItems();
        $skus = array();
        foreach($items as $item) {
            $skus[] = $item->getSku();
        }
        if(count($skus) == 1) {
            return implode('', $skus);
        }
        return $skus;
    }

    public function getProductName()
    {
        $items = $this->getAllItems();
        foreach($items as $item) {
            $name = $item->getName();
        }
        return $name;
    }

}