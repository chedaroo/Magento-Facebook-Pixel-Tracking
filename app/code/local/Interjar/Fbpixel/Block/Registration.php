<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 11/08/2016
 * Time: 16:35
 */

class Interjar_Fbpixel_Block_Registration extends Interjar_Fbpixel_Block_Head
{
    public function canShowRegistration()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_complete_registration') && Mage::getSingleton('core/session')->getRegistrationSuccess(true)) {
            return true;
        }
        return false;
    }
}