<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 10/08/2016
 * Time: 11:50
 */

class Webtise_Fbpixel_Block_Search extends Webtise_Fbpixel_Block_Head
{
    public function getSearchTerm()
    {
        return Mage::helper('catalogsearch')->getQueryText();
    }

    /**
     * Return boolean based on search setting
     *
     * @return bool
     */
    public function showSearch()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_search')) {
            return true;
        }
        return false;
    }
}