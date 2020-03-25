<div class="order-summary">
    <div class="total_price_container">
        <ul>
            <li>
                <p>ВСЕГО</p>
                <span id="total-summ">{{ core()->currency($cart->base_grand_total) }}</span>
            </li>
            <li>
                <a href="{{ route('shop.checkout.onepage.index') }}">ПЕРЕЙТИ К ОПЛАТЕ</a>
            </li>
        </ul>
    </div>
</div>