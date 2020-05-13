@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.onepage.title') }}
@stop

@section('content-wrapper')
    <checkout></checkout>
@endsection

@push('scripts')
    @include('shop::checkout.cart.coupon')
    <script type="text/x-template" id="checkout-template">
        <div id="checkout" class="checkout-process">
            <main>
                <ul class="breadcrumb_navigation">
                    <li><a href="/">{{ __('app.home') }}</a></li>
                    <li><a href="{{ route('shop.checkout.cart.index') }}">{{ __('app.payment_process') }}</a></li>
                    <li><a href="{{ route('shop.checkout.onepage.index') }}">{{ __('app.details') }}</a></li>
                </ul>
                <div class="payment_details" v-if="!success_order">
                    <div class="container fluid">
                        <div class="row justify-content-between">
                            <div class="col-lg-5">
                                <div class="row no-gutters">
                                    <form data-vv-scope="address-form">
                                        <div class="row no-gutters">
                                        @include('shop::checkout.onepage.customer-info')

                                        <div class="col-12">
                                            <h4>{{ __('shop::app.checkout.onepage.payment-method') }}</h4>
                                        </div>
                                        <div class="col-12">
                                            <payment-section @onPaymentMethodSelected="paymentMethodSelected($event)"></payment-section>
                                        </div>
                                    </form>
{{--                                    <div class="col-12">--}}
{{--                                        <h4>{{ __('shop::app.checkout.onepage.shipping-method') }}</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12">--}}
{{--                                        @foreach(\Illuminate\Support\Facades\Config::get('carriers') as $method)--}}
{{--                                            @php--}}
{{--                                                $method = new $method['class']();--}}

{{--                                                $method = $method->calculate();--}}

{{--                                            @endphp--}}
{{--                                            <ul class="delivery_cont">--}}
{{--                                                <li>--}}
{{--                                                    <div class="form-check">--}}
{{--                                                        <input type="radio"--}}
{{--                                                               class="form-check-input"--}}
{{--                                                               v-validate="'required'"--}}
{{--                                                               type="radio"--}}
{{--                                                               id="{{ $method->method }}"--}}
{{--                                                               name="shipping_method"--}}
{{--                                                               data-vv-as="&quot;{{ __('shop::app.checkout.onepage.shipping-method') }}&quot;"--}}
{{--                                                               value="{{ $method->method }}"--}}
{{--                                                               v-model="selected_shipping_method"--}}
{{--                                                               @change="shippingMethodSelected($event)"--}}
{{--                                                               :disabled="!address_form_validate"--}}
{{--                                                        >--}}

{{--                                                        <label class="form-check-label"--}}
{{--                                                               for="{{ $method->method }}">{{ $method->method_title }}</label>--}}
{{--                                                    </div>--}}
{{--                                                    <p>{{ $method->method_description }}</p>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="payment_price">
                                    <div class="row no-gutters">
                                        <div class="col-">
                                            <ul class="payment_product_row">
                                                @foreach ($cart->items as $key => $item)
                                                    @php
                                                        $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
                                                    @endphp
                                                    <li>
                                                        <i style="background-image: url({{ $productBaseImage['medium_image_url'] }})"></i>
                                                        <p>{{ $item->product->name }}</p>
                                                        <h2 data-price="{{ $item->base_total}}">{{ core()->currency( $item->base_total) }}</h2>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8">
                                            <div class="promo_code">
                                                <h2>промо код</h2>
                                                <div class="form-group">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <summary-section :key="summeryComponentKey"></summary-section>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <button type="button" @click="placeOrder()"
                                        :disabled="disable_button" id="checkout-place-order-button">{{ __('shop::app.checkout.onepage.place-order') }}</button>
                                <p class="order_info">{{ __('shop::app.checkout.onepage.payment-term') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="success_order" v-if="success_order">
                    <h1>Success Order</h1>
                </div>
            </main>
        </div>
    </script>

    <script type="text/x-template" id="payment-template">
        <div>
            @include('shop::checkout.onepage.payment')
        </div>
    </script>

    <script type="text/x-template" id="summary-template">
        <div>
            @include('shop::checkout.total.summary')
        </div>
    </script>

    <script>
        var shippingHtml = '';
        var paymentHtml = '';
        var reviewHtml = '';
        var summaryHtml = '';
        var customerAddress = '';
        var shippingMethods = '';
        var paymentMethods = '';

        @auth('customer')
            @if(auth('customer')->user()->addresses)
            customerAddress = @json(auth('customer')->user()->addresses);
            customerAddress.email = "{{ auth('customer')->user()->email }}";
            customerAddress.first_name = "{{ auth('customer')->user()->first_name }}";
            customerAddress.last_name = "{{ auth('customer')->user()->last_name }}";
            @endif
        @endauth

        Vue.component('checkout', {
            template: '#checkout-template',
            inject: ['$validator'],

            data: function () {
                return {
                    address_form_validate: true,
                    success_order: false,
                    step_numbers: {
                        'information': 1,
                        'shipping': 2,
                        'payment': 3,
                        'review': 4
                    },

                    current_step: 1,

                    completed_step: 0,

                    address: {
                        billing: {
                            address1: [''],
                            state: 'Republic of Armenia',
                            country: 'Armenia',
                            use_for_shipping: true,
                        },

                        shipping: {
                            address1: ['']
                        },
                    },

                    selected_shipping_method: "flatrate_flatrate",

                    selected_payment_method: {method: "{{ Webkul\Payment\Facades\Payment::getPaymentMethods()[0]['method'] }}"},

                    disable_button: false,

                    new_shipping_address: false,

                    new_billing_address: false,

                    allAddress: {},

                    countryStates: @json(core()->groupedStatesByCountries()),

                    country: @json(core()->countries()),

                    summeryComponentKey: 0,

                    reviewComponentKey: 0,

                    is_customer_exist: 0,

                    updateSummaryPrice: 0,

                    dataShippingKey: 0,
                }
            },

            created: function () {
                this.getOrderSummary();

                if (!customerAddress) {
                    this.new_shipping_address = true;
                    this.new_billing_address = true;
                } else {
                    this.address.billing.first_name = this.address.shipping.first_name = customerAddress.first_name;
                    this.address.billing.last_name = this.address.shipping.last_name = customerAddress.last_name;
                    this.address.billing.email = this.address.shipping.email = customerAddress.email;

                    if (customerAddress.length < 1) {
                        this.new_shipping_address = true;
                        this.new_billing_address = true;
                    } else {
                        this.allAddress = customerAddress;

                        for (var country in this.country) {
                            for (var code in this.allAddress) {
                                if (this.allAddress[code].country) {
                                    if (this.allAddress[code].country == this.country[country].code) {
                                        this.allAddress[code]['country'] = this.country[country].name;
                                    }
                                }
                            }
                        }
                    }
                }
            },

            methods: {
                navigateToStep: function (step) {
                    if (step <= this.completed_step) {
                        this.current_step = step
                        this.completed_step = step - 1;
                    }
                },

                haveStates: function (addressType) {
                    if (this.countryStates[this.address[addressType].country] && this.countryStates[this.address[addressType].country].length)
                        return true;

                    return false;
                },

                validateForm: function (scope) {
                    var this_this = this;

                    this.$validator.validateAll(scope).then(function (result) {
                        if (result) {
                            if (scope == 'address-form') {
                                this_this.saveAddress();
                            } else if (scope == 'shipping-form') {
                                this_this.saveShipping();
                            } else if (scope == 'payment-form') {
                                this_this.savePayment();
                            }
                        }
                    });
                },

                validateAddressForm: function() {
                    // var this_this = this;
                    // this.$validator.validate().then(function(res) {
                    //     console.log(res);
                    // });
                    // this.$validator.validateAll('address-form').then(function (result) {
                    //     this_this.address_form_validate = true;
                        // this_this.saveAddress();
                    // });
                },

                isCustomerExist: function () {
                    this.$validator.attach({name: "email", rules: "required|email"});

                    var this_this = this;

                    this.$validator.validate('email', this.address.billing.email)
                        .then(function (isValid) {
                            if (!isValid)
                                return;

                            this_this.$http.post("{{ route('customer.checkout.exist') }}", {email: this_this.address.billing.email})
                                .then(function (response) {
                                    this_this.is_customer_exist = response.data ? 1 : 0;
                                })
                                .catch(function (error) {
                                })

                        })
                },

                loginCustomer: function () {
                    var this_this = this;

                    this_this.$http.post("{{ route('customer.checkout.login') }}", {
                        email: this_this.address.billing.email,
                        password: this_this.address.billing.password
                    })
                        .then(function (response) {
                            if (response.data.success) {
                                window.location.href = "{{ route('shop.checkout.onepage.index') }}";
                            } else {
                                window.flashMessages = [{'type': 'alert-error', 'message': response.data.error}];

                                this_this.$root.addFlashMessages()
                            }
                        })
                        .catch(function (error) {
                        })
                },

                getOrderSummary() {
                    var this_this = this;

                    this.$http.get("{{ route('shop.checkout.summary') }}")
                        .then(function (response) {
                            summaryHtml = Vue.compile(response.data.html)

                            this_this.summeryComponentKey++;
                            this_this.reviewComponentKey++;

                            console.log(response, summaryHtml);
                        })
                        .catch(function (error) {
                        })
                },

                saveAddress: function (for_shipping, dataShippingKey) {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-address') }}", {...this.address, for_shipping, dataShippingKey})
                        .then(function (response) {

                            this_this.disable_button = false;

                            if (this_this.step_numbers[response.data.jump_to_section] == 2)
                                shippingHtml = Vue.compile(response.data.html)
                            else
                                paymentHtml = Vue.compile(response.data.html)

                            this_this.completed_step = this_this.step_numbers[response.data.jump_to_section] - 1;
                            this_this.current_step = this_this.step_numbers[response.data.jump_to_section];

                            shippingMethods = response.data.shippingMethods;
                            paymentMethods = response.data.paymentMethods;

                            this_this.getOrderSummary();
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'address-form')
                        })
                },

                saveShipping: function (dataShippingKey) {
                    var this_this = this;

                    this.disable_button = true;
                    this.$http.post("{{ route('shop.checkout.save-shipping') }}", {'shipping_method': this.selected_shipping_method, 'dataShippingKey': dataShippingKey})
                        .then(function (response) {
                            this_this.disable_button = false;

                            paymentHtml = Vue.compile(response.data.html)
                            this_this.completed_step = this_this.step_numbers[response.data.jump_to_section] - 1;
                            this_this.current_step = this_this.step_numbers[response.data.jump_to_section];

                            paymentMethods = response.data.paymentMethods;

                            this_this.getOrderSummary();
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;

                            this_this.handleErrorResponse(error.response, 'shipping-form')
                        })
                    console.log("SaveShipping", this);
                },

                updateSummaryCart: function(event){
                    // this.address.billing.city = this.dataShippingKey.label;
                    this.saveAddress(true, this.dataShippingKey);
                    this.saveShipping(this.dataShippingKey);
                },
                savePayment: function () {
                    var this_this = this;

                    this.disable_button = true;

                    this.$http.post("{{ route('shop.checkout.save-payment') }}", {'payment': this.selected_payment_method})
                        .then(function (response) {
                            this_this.disable_button = false;

                            reviewHtml = Vue.compile(response.data.html)
                            this_this.completed_step = this_this.step_numbers[response.data.jump_to_section] - 1;
                            this_this.current_step = this_this.step_numbers[response.data.jump_to_section];

                            // this_this.validateForm('address-form');

                            this_this.getOrderSummary();
                        })
                        .catch(function (error) {
                            this_this.disable_button = false;
                            console.log(error, 'payment-form');

                            this_this.handleErrorResponse(error.response, 'payment-form')
                        });
                },

                saveOrder: function () {
                    var this_this = this;

                    this.$http.post("{{ route('shop.checkout.save-order') }}", {'_token': "{{ csrf_token() }}"})
                        .then(function (response) {
                            if (response.data.success) {
                                console.log(response.data, response.data.data.formUrl);
                                this_this.success_order = true;
                                if (response.data.data.formUrl) {
                                    window.location.href = response.data.data.formUrl;
                                } else {
                                    window.location.href = "{{ route('shop.checkout.success') }}"  ;
                                }
                            }
                        })
                        .catch(function (error) {
                            this_this.disable_button = true;

                            window.flashMessages = [{
                                'type': 'alert-error',
                                'message': "{{ __('shop::app.common.error') }}"
                            }];

                            this_this.$root.addFlashMessages()
                        })
                },

                placeOrder: function () {
                    var this_this = this;

                    this.disable_button = true;
                    this.savePayment();
                    this.saveOrder();
                },

                handleErrorResponse: function (response, scope) {
                    console.log(response);
                    if (response.status == 422) {
                        serverErrors = response.data.errors;
                        this.$root.addServerErrors(scope)
                    } else if (response.status == 403) {
                        if (response.data.redirect_url) {
                            window.location.href = response.data.redirect_url;
                        }
                    }
                },

                shippingMethodSelected: function (shippingMethod) {
                    this.selected_shipping_method = shippingMethod.target.value;
                    this.saveAddress(true);
                    this.saveShipping();
                },

                paymentMethodSelected: function (paymentMethod) {
                    this.selected_payment_method = paymentMethod;
                },

                newBillingAddress: function () {
                    this.new_billing_address = true;
                    this.address.billing.address_id = null;
                },

                newShippingAddress: function () {
                    this.new_shipping_address = true;
                    this.address.shipping.address_id = null;
                },

                backToSavedBillingAddress: function () {
                    this.new_billing_address = false;
                },

                backToSavedShippingAddress: function () {
                    this.new_shipping_address = false;
                },
            }
        })

        var shippingTemplateRenderFns = [];

        Vue.component('shipping-section', {
            inject: ['$validator'],

            data: function () {
                return {
                    templateRender: null,

                    selected_shipping_method: 'flatrate_flatrate',

                    first_iteration: true,
                }
            },

            staticRenderFns: shippingTemplateRenderFns,

            mounted: function () {
                for (method in shippingMethods) {
                    if (this.first_iteration) {
                        for (rate in shippingMethods[method]['rates']) {
                            this.selected_shipping_method = shippingMethods[method]['rates'][rate]['method'];
                            this.first_iteration = false;
                            this.methodSelected();
                        }
                    }
                }

                this.templateRender = shippingHtml.render;
                for (var i in shippingHtml.staticRenderFns) {
                    shippingTemplateRenderFns.push(shippingHtml.staticRenderFns[i]);
                }

                eventBus.$emit('after-checkout-shipping-section-added');
            },

            render: function (h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                ]);
            },

            methods: {
                methodSelected: function () {
                    this.$emit('onShippingMethodSelected', this.selected_shipping_method)

                    eventBus.$emit('after-shipping-method-selected');
                }
            }
        })

        var paymentTemplateRenderFns = [];

        Vue.component('payment-section', {
            inject: ['$validator'],
            template: '#payment-template',
            data: function () {
                return {
                    templateRender: null,

                    payment: {
                        method: "{{ Webkul\Payment\Facades\Payment::getPaymentMethods()[0]['method'] }}"
                    },

                    first_iteration: true,
                }
            },

            mounted: async function () {
                for (method in paymentMethods) {
                    if (this.first_iteration) {
                        this.payment.method = paymentMethods[method]['method'];
                        this.first_iteration = false;
                        this.methodSelected();
                    }
                }

                eventBus.$emit('after-checkout-payment-section-added');
            },

            methods: {
                methodSelected: function () {
                    this.$emit('onPaymentMethodSelected', this.payment)

                    eventBus.$emit('after-payment-method-selected');
                }
            }
        })

        var reviewTemplateRenderFns = [];

        Vue.component('review-section', {
            data: function () {
                return {
                    templateRender: null,

                    error_message: ''
                }
            },

            staticRenderFns: reviewTemplateRenderFns,

            render: function (h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                ]);
            },

            mounted: function () {
                this.templateRender = reviewHtml.render;

                for (var i in reviewHtml.staticRenderFns) {
                    // reviewTemplateRenderFns.push(reviewHtml.staticRenderFns[i]);
                    reviewTemplateRenderFns[i] = reviewHtml.staticRenderFns[i];
                }

                this.$forceUpdate();
            }
        });


        var summaryTemplateRenderFns = [];

        Vue.component('summary-section', {
            inject: ['$validator'],

            data: function () {
                return {
                    templateRender: null
                }
            },

            staticRenderFns: summaryTemplateRenderFns,

            mounted: function () {
                this.templateRender = summaryHtml.render;

                for (var i in summaryHtml.staticRenderFns) {
                    // summaryTemplateRenderFns.push(summaryHtml.staticRenderFns[i]);
                    summaryTemplateRenderFns[i] = summaryHtml.staticRenderFns[i];
                }

                this.$forceUpdate();
            },

            render: function (h) {
                return h('div', [
                    (this.templateRender ?
                        this.templateRender() :
                        '')
                ]);
            }
        })
    </script>

@endpush