@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.cart.title') }}
@stop

@section('content-wrapper')
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    <main>
        <ul class="header_social mobile_social">
            <li class="languages">
                <a href="javascript:;" class="arm_icon" style="background-image: url('/themes/bliss/assets/images/hg/icons/ge.png')"></a>
                <a href="javascript:;" class="eng_icon" style="background-image: url('/themes/bliss/assets/images/hg/icons/en.png')"></a>
                <a href="javascript:;" class="rus_icon" style="background-image: url('/themes/bliss/assets/images/hg/icons/ru.png')"></a>
            </li>
            <li class="social">
                <a href="javascript:;" class="facebook_icon"
                   style="background-image: url('/themes/bliss/assets/images/hg/icons/facebook-icon.png')"></a>
                <a href="javascript:;" class="youtube_icon"
                   style="background-image: url('/themes/bliss/assets/images/hg/icons/youtube-icon.png')"></a>
                <a href="javascript:;" class="instagram_icon"
                   style="background-image: url('/themes/bliss/assets/images/hg/icons/instagram-icon.png')"></a>
            </li>
        </ul>
        <ul class="breadcrumb_navigation">
            <li><a href="index.html">Главная</a></li>
            <li><a href="about-us.html">ЗАРЕГИСТРИРОВАТЬСЯ</a></li>
        </ul>
        <div class="basket">
            @if ($cart)
                <div class="product_header">
                    <h1>Просмотр заказа</h1>
                </div>
                <form action="{{ route('shop.checkout.cart.update') }}" method="POST" @submit.prevent="onSubmit" id="cart-form">
                    @csrf
                    <div class="table-responsive-xl">
                        <table class="table table-borderless ">
                            <thead>
                            <tr>
                                <th scope="col" rowspan="6">ПРОДУКТ</th>
                                <th scope="col" rowspan="3">КОЛ-ВО</th>
                                <th scope="col" rowspan="2">ЦЕНА</th>
                                <th scope="col" rowspan="2">ИТОГО</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cart->items as $key => $item)
                                @php
                                    $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
                                @endphp
                                <tr>
                                    <td>
                                        <ul class="table_product">
                                            <li>
                                                <i style="background-image: url({{ $productBaseImage['medium_image_url'] }})"></i>
                                            </li>
                                            <li><a href="{{ route('shop.productOrCategory.index', $item->product->url_key) }}">{{ $item->product->name }}</a></li>
                                        </ul>
                                    </td>
                                    <td>
                                        @if ($item->product->getTypeInstance()->showQuantityBox() === true)
                                            <quantity-changer
                                                item_id="{{ $item->id }}"
                                                product_id="{{ $item->product->product_id }}"
                                                :control-name="'qty[{{$item->id}}]'"
                                                quantity="{{$item->quantity}}"
                                                max="{{ $item->product->inventories->first()->qty }}">
                                            </quantity-changer>
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="table_price">
                                            <li>
                                                <span data-price="{{ $item->product->price }}">{!! $item->product->getTypeInstance()->getPriceHtml() !!}</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="table_total">
                                            <li>
                                                <span id="item-total-{{ $item->id }}">{{ core()->currency( $item->base_total) }}</span>
                                            </li>
                                            <li>
                                                <a href="{{ route('shop.checkout.cart.remove', ['id' => $item->id]) }}"
                                                   onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">
                                                    <div>
                                                        <i style="background-image: url(/themes/bliss/assets/images/hg/icons/close-icon-blue.png); background-size: cover;"></i>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="right-side">
                        {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}

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

                        {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}
                    </div>
                </form>
            @else
                <div class="title">
                    {{ __('shop::app.checkout.cart.title') }}
                </div>

                <div class="cart-content">
                    <p>
                        {{ __('shop::app.checkout.cart.empty') }}
                    </p>

                    <p style="display: inline-block;">
                        <a style="display: inline-block;" href="{{ route('shop.home.index') }}"
                           class="btn btn-lg btn-primary">{{ __('shop::app.checkout.cart.continue-shopping') }}</a>
                    </p>
                </div>
            @endif
        </div>
    </main>
@endsection

@push('scripts')
    @include('shop::checkout.cart.coupon')

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">
            <div class="wrap">
                <div class="input-group">
                     <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number"
                                @click="decreaseQty()" @mouseleave="updateStorage()">
                            <span class="glyphicon glyphicon-minus">-</span>
                        </button>
                    </span>
                    <input :name="controlName" class="control" :value="qty" v-validate="'required|numeric|min_value:1'"
                           data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;" readonly class="quantity form-control input-number">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number"
                                @click="increaseQty()" @mouseleave="updateStorage()">
                            <span class="glyphicon glyphicon-plus">+</span>
                        </button>
                    </span>
                    <span class="control-error" v-if="errors.has(controlName)">@{{ errors.first(controlName) }}</span>
                </div>
            </div>
        </div>
    </script>

    <script>
        Vue.component('quantity-changer', {
            template: '#quantity-changer-template',

            inject: ['$validator'],

            props: {
                item_id: {
                    type: [Number, String]
                },

                product_id: {
                    type: [Number, String]
                },

                controlName: {
                    type: String,
                    default: 'quantity'
                },

                quantity: {
                    type: [Number, String],
                    default: 1
                },

                max: {
                    type: [Number, String],
                    default: 1
                }
            },

            data: function () {
                return {
                    qty: this.quantity,
                    qty_changed: false
                }
            },

            mounted: function() {
                let {item_id} = this;
                let products = window.localStorage.getItem('cart_products');

                if(products) {
                    products = JSON.parse(products);
                    for(let product in products) {
                        if(products.hasOwnProperty(product) && product == item_id) {
                            this.qty = products[product];
                        }
                    }
                    localStorage.removeItem('cart_products');
                }
            },

            updated: function() {
                this.updateCart();
            },

            watch: {
                quantity: function (val) {
                    this.qty = val;

                    this.$emit('onQtyUpdated', this.qty);
                }
            },

            methods: {
                decreaseQty: function () {
                    if (this.qty > 1) {
                        this.qty = parseInt(this.qty) - 1;
                        this.qty_changed = true;
                    }

                    this.$emit('onQtyUpdated', this.qty);
                },

                increaseQty: function () {
                    if(parseInt(this.qty) < parseInt(this.max)) {
                        this.qty = parseInt(this.qty) + 1;
                        this.qty_changed = true;
                    }

                    this.$emit('onQtyUpdated', this.qty);
                },

                updateStorage: function () {
                    let storage_cart_products = localStorage.getItem('cart_products') || {};

                    if(storage_cart_products.length) {
                        storage_cart_products = JSON.parse(storage_cart_products);
                    }

                    storage_cart_products[this.item_id] = this.qty;

                    localStorage.setItem('cart_products', JSON.stringify(storage_cart_products));
                },

                updateCart: function () {
                    let total_value = 0;
                    $('.basket tbody tr').each(function(i, el) {
                        let qty = parseInt($(el).find('input.quantity').val());
                        let sum = parseInt($(el).find('span[data-price]').attr('data-price'));
                        total_value += qty * sum;
                        let total = $(el).find('.table_total span');
                        let formated = new Intl.NumberFormat('en-Us', { style: 'currency', currency: '{{ core()->getCurrentCurrencyCode() }}' }).format(qty * sum);

                        total.text(formated);
                    });
                    let formated = new Intl.NumberFormat('en-Us', { style: 'currency', currency: '{{ core()->getCurrentCurrencyCode() }}' }).format(total_value);
                    $('#total-summ, .header_price').text(formated);
                }
            }
        });

        function removeLink(message) {
            if (!confirm(message))
                event.preventDefault();
        }

        function updateCartQunatity(operation, index) {
            var quantity = document.getElementById('cart-quantity' + index).value;

            if (operation == 'add') {
                quantity = parseInt(quantity) + 1;
            } else if (operation == 'remove') {
                if (quantity > 1) {
                    quantity = parseInt(quantity) - 1;
                } else {
                    alert('{{ __('shop::app.products.less-quantity') }}');
                }
            }
            document.getElementById('cart-quantity' + index).value = quantity;
            event.preventDefault();
        }

    </script>
@endpush