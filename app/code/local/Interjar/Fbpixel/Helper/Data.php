<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 09/08/2016
 * Time: 10:23
 */

class Interjar_Fbpixel_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Check system config to see if Fb Pixel is enabled
     *
     * @return bool
     */
    public function isEnabled() {
        $storeId = Mage::app()->getStore()->getId();
        if(Mage::getStoreConfig('fbpixel/general/enabled', $storeId)) {
            return true;
        }
        return false;
    }
    /**
     * Check system config to see if Fb Pixel is enabled
     *
     * @return bool
     */
    public function isLoadingJsLocally() {
        $storeId = Mage::app()->getStore()->getId();
        if(Mage::getStoreConfig('fbpixel/general/load_local_js', $storeId)) {
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