<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 09/08/2016
 * Time: 15:13
 */

class Interjar_Fbpixel_Block_Category extends Interjar_Fbpixel_Block_Head
{
    /**
     * @var Mage_Catalog_Model_Category
     */
    protected $_category;

    /**
     * Interjar_Fbpixel_Block_Viewcontent_Category constructor.
     * Set category using registry object
     */
    public function __construct()
    {
        if(Mage::registry('current_category')) {
            $this->_category = Mage::registry('current_category');
        }
        parent::__construct();
    }

    /**
     * Return boolean based on view content setting
     *
     * @return bool
     */
    public function showViewCategory()
    {
        if(Mage::getStoreConfig('fbpixel/events/enable_view_category')) {
            return true;
        }
        return false;
    }

    /**
     * Current category name
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->_category->getName();
    }

    /**
     * Current breadcrumbs path
     *
     * @return string
     */
    public function getBreadcrumb()
    {
        $path = Mage::helper('catalog')->getBreadcrumbPath();
        $names = array_map(function($a) { return $a['label']; }, $path); // Return labels as an array
        $breadcrumb = implode(' > ', $names);
        return $breadcrumb;
    }

    /**
     * Return an array of the top 5-10 Product SKUs in the Category
     */
    public function getProductSkus()
    {
        $skus = [];
        $products = $this->_category
            ->getProductCollection()
            ->addAttributeToSelect('sku')
            ->addAttributeToFilter('status', 1)
            ->addAttributeToFilter('visibility', 4)
            ->setPageSize(10)
            ->setOrder('position', 'ASC');

        foreach ($products as $product) {
            $skus[] = $product->getSku();
        }

        return json_encode($skus);
    }
}
