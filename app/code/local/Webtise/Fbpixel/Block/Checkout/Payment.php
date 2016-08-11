<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 11/08/2016
 * Time: 13:37
 */

class Webtise_Fbpixel_Block_Checkout_Payment extends Webtise_Fbpixel_Block_Checkout
{

    /**
     * Return Bool on whether AddPaymentMethod change tracking can be shown
     *
     * @return bool
     */
    public function canShowPaymentChanged()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_add_payment_info') && Mage::getSingleton('core/session')->getPaymentSavedFlag(true)) {
            return true;
        }
        return false;
    }

}