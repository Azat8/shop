<?php


namespace Webkul\Shipping\Carriers;
use Config;
use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Checkout\Facades\Cart;

class Express extends AbstractShipping
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code = 'express';

    /**
     * Returns rate for express
     *
     * @return array
     */
    public function calculate()
    {
        if (! $this->isAvailable())
            return false;

        $cart = Cart::getCart();

        $object = new CartShippingRate;

        $object->carrier = 'express';
        $object->carrier_title = $this->getConfigData('title');
        $object->method = 'express_express';
        $object->method_title = $this->getConfigData('title');
        $object->method_description = $this->getConfigData('description');
        $object->price = 0;
        $object->base_price = 0;

        if ($cart->bas_sub_total >= $this->getConfigData('price')) {
            $object->price = core()->convertPrice($this->getConfigData('price'));
            $object->base_price = $this->getConfigData('price');
        }

        return $object;
    }
}