<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 09/08/2016
 * Time: 10:39
 */

class Interjar_Fbpixel_Block_Head extends Mage_Page_Block_Html_Head
{
    /**
     * @var Interjar_Fbpixel_Helper_Data
     */
    protected $_helper;

    /**
     * @var string
     */
    protected $_pixelId;

    public function __construct()
    {
        $this->_helper = Mage::helper('fbpixel');
        $this->setPixelId();
        parent::__construct();
    }

    /**
     * Set Pixel Tracking Id based on system configuration value
     */
    public function setPixelId() {
        $id = Mage::getStoreConfig('fbpixel/general/pixel_id');
        if($this->_pixelId !== $id) {
            $this->_pixelId = $id;
        }
    }

    /**
     * Return Pixel Tracking Id
     *
     * @return mixed
     */
    public function getPixelId() {
        return $this->_pixelId;
    }
}