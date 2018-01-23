<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 09/08/2016
 * Time: 10:18
 */

class Interjar_Fbpixel_Model_System_Config_Source_Event_Types
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'viewContent',
                'label' => 'View Content'
            ),
            array(
                'value' => 'ViewCategory',
                'label' => 'View Category'
            ),
            array(
                'value' => 'Search',
                'label' => 'Search'
            ),
            array(
                'value' => 'AddToCart',
                'label' => 'Add To Cart'
            ),
            array(
                'value' => 'AddToWishlist',
                'label' => 'Add To Wishlist'
            ),
            array(
                'value' => 'InitiateCheckout',
                'label' => 'Initiate Checkout'
            ),
            array(
                'value' => 'AddPaymentInfo',
                'label' => 'Add Payment Info'
            ),
            array(
                'value' => 'Purchase',
                'label' => 'Purchase'
            ),
            array(
                'value' => 'Lead',
                'label' => 'Lead'
            ),
            array(
                'value' => 'CompleteRegistration',
                'label' => 'Complete Registration'
            )
        );
    }
}