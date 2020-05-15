{{--<div class="order-summary">--}}
{{--    <div class="total_price_container">--}}
{{--        <ul>--}}
{{--            <li>--}}
{{--                <p>ВСЕГО</p>--}}
{{--                <span id="total-summ">{{ core()->currency($cart->base_grand_total) }}</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('shop.checkout.onepage.index') }}">ПЕРЕЙТИ К ОПЛАТЕ</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}

<div>
    <div class="row no-gutters">
        <div class="col-lg-5">
            <p>{{ __('shop::app.checkout.onepage.order-summary') }}:</p>
        </div>
        <div class="col-lg-7">
            <span id="total">{{ core()->currency($cart->base_sub_total) }}</span>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-5">
            <p>{{ __('shop::app.checkout.onepage.shipping-method') }}:</p>
        </div>
        <div class="col-lg-7">
        <span id="shipping_price">
            @if ($cart->selected_shipping_rate)
                {{ core()->currency($cart->selected_shipping_rate->base_price) }}
            @else
                0
            @endif
        </span>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-5">
            <p>{{__('app.total_price')}}:</p>
        </div>
        <div class="col-lg-7">
            <span id="grand_total">{{ core()->currency($cart->base_grand_total) }}</span>
        </div>
    </div>

</div>

{{--<div class="order-summary fs16">--}}
{{--    <h3 class="fw6">{{ __('velocity::app.checkout.cart.cart-summary') }}</h3>--}}

{{--    <div class="row">--}}
{{--        <span class="col-8">{{ __('velocity::app.checkout.sub-total') }}</span>--}}
{{--        <span class="col-4 text-right">{{ core()->currency($cart->base_sub_total) }}</span>--}}
{{--    </div>--}}

{{--    @if ($cart->selected_shipping_rate)--}}
{{--        <div class="row">--}}
{{--            <span class="col-8">{{ __('shop::app.checkout.total.delivery-charges') }}</span>--}}
{{--            <span class="col-4 text-right">{{ core()->currency($cart->selected_shipping_rate->base_price) }}</span>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if ($cart->base_tax_total)--}}
{{--        @foreach (Webkul\Tax\Helpers\Tax::getTaxRatesWithAmount($cart, true) as $taxRate => $baseTaxAmount )--}}
{{--            <div class="row">--}}
{{--                <span class="col-8" id="taxrate-{{ core()->taxRateAsIdentifier($taxRate) }}">{{ __('shop::app.checkout.total.tax') }} {{ $taxRate }} %</span>--}}
{{--                <span class="col-4 text-right" id="basetaxamount-{{ core()->taxRateAsIdentifier($taxRate) }}">{{ core()->currency($baseTaxAmount) }}</span>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    @endif--}}

{{--    @if (--}}
{{--        $cart->base_discount_amount--}}
{{--        && $cart->base_discount_amount > 0--}}
{{--    )--}}
{{--        <div--}}
{{--            id="discount-detail"--}}
{{--            class="row">--}}

{{--            <span class="col-8">{{ __('shop::app.checkout.total.disc-amount') }}</span>--}}
{{--            <span class="col-4 text-right">--}}
{{--                -{{ core()->currency($cart->base_discount_amount) }}--}}
{{--            </span>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <div class="payable-amount row" id="grand-total-detail">--}}
{{--        <span class="col-8">{{ __('shop::app.checkout.total.grand-total') }}</span>--}}
{{--        <span class="col-4 text-right fw6" id="grand-total-amount-detail">--}}
{{--            {{ core()->currency($cart->base_grand_total) }}--}}
{{--        </span>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <a--}}
{{--            href="{{ route('shop.checkout.onepage.index') }}"--}}
{{--            class="theme-btn text-uppercase col-12 remove-decoration fw6 text-center">--}}
{{--            {{ __('velocity::app.checkout.proceed') }}--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</div>--}}