<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 09/08/2016
 * Time: 10:23
 */

class Webtise_Fbpixel_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Check system config to see if Fb Pixel is enabled
     *
     * @return bool
     */
    public function isEnabled() {
        if(Mage::getStoreConfig('fbpixel/general/enabled')) {
            return true;
        }
        return false;
    }

    /**
     * Figure out whether current area is admin/frontend
     *
     * @return bool
     */
    public function isAdmin() {
        if(Mage::app()->getStore()->isAdmin()) {
            return true;
        }
        if(Mage::getDesign()->getArea() == 'adminhtml') {
            return true;
        }
        return false;
    }
}