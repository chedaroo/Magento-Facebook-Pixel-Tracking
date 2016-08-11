<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 10/08/2016
 * Time: 16:21
 */

class Webtise_Fbpixel_Block_Wishlist extends Webtise_Fbpixel_Block_Product
{
    /**
     * @var bool|Mage_Catalog_Model_Product
     */
    protected $_product;

    /**
     * Set product
     *
     * Webtise_Fbpixel_Block_Wishlist constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_product = $this->getLatestItem();
    }

    /**
     * Get last product added to the wishlist
     *
     * @return bool|Mage_Catalog_Model_Product
     */
    public function getLatestItem()
    {
        $itemCollection = Mage::helper('wishlist')->getWishlistItemCollection();
        $size = $itemCollection->getSize();
        if($size > 0) {
            $item = $itemCollection->getLastItem();
            $product = Mage::getModel('catalog/product')->load($item->getProductId());
            return $product;
        }
        return false;
    }

    /**
     * Return boolean on whether Add To Wishlist tracking is shown
     *
     * @return bool
     */
    public function canShowWishlist()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_add_to_wishlist') && Mage::getSingleton('core/session')->getProductAddedToWishlist(true)) {
            return true;
        }
        return false;
    }
}