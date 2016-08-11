<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 09/08/2016
 * Time: 10:36
 */

class Webtise_Fbpixel_Model_Observer
{
    public function addToCartTracking(Varien_Event_Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        if($product) {
            try {
                Mage::getSingleton('core/session')->setProductAddedToCartFlag(true);
            } catch(Exception $e) {
                Mage::logException($e);
            }
        }
    }

    public function addToWishlistTracking()
    {
        try {
            Mage::getSingleton('core/session')->setProductAddedToWishlistFlag(true);
        } catch(Exception $e) {
            Mage::logException($e);
        }
    }

    public function addPaymentMethodInfoTracking(Varien_Event_Observer $observer)
    {
        try {
            $method = $observer->getEvent()->getPayment()->getMethod();
            if(!Mage::getSingleton('core/session')->getPaymentSavedFlag() && $method) {
                Mage::getSingleton('core/session')->setPaymentSavedFlag(true);
            }
        } catch(Exception $e) {
            Mage::logException($e);
        }
    }

    public function addRegistrationTracking()
    {
        try {
            Mage::getSingleton('core/session')->setRegistrationSuccess(true);
        } catch(Exception $e) {
            Mage::logException($e);
        }
    }
}