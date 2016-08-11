<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 11/08/2016
 * Time: 16:35
 */

class Webtise_Fbpixel_Block_Registration extends Webtise_Fbpixel_Block_Head
{
    public function canShowRegistration()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_complete_registration') && Mage::getSingleton('core/session')->getRegistrationSuccess(true)) {
            return true;
        }
        return false;
    }
}