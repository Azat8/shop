<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <title>@yield('page_title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <style>
        main .alert-wrapper .alert-error {
            background-color: #f8d7da!important;
            color: #721c24;
            border-color: #f5c6cb;
        }
    </style>
{{--    <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/themes/bliss/assets/css/ui.css') }}">--}}

<!--FAVICON-->
    <link rel='icon' href='/themes/bliss/assets/images/hg/HG-Logo.png' type='image/x-icon'/>
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="/themes/bliss/assets/css/libs/all.css">
    <!--BOOTSTRAP 4-->
    <link rel="stylesheet" href="/themes/bliss/assets/css/libs/bootstrap.min.css">
    <!--SLICK SLIDER-->
    <link rel="stylesheet" href="/themes/bliss/assets/css/libs/slick-theme.css">
    <link rel="stylesheet" href="/themes/bliss/assets/css/libs/slick.css">
    <!--MAIN STYLE-->
    <link rel="stylesheet" href="/themes/bliss/assets/css/style.css">

    <!--JQUERY-->

    <!--MAIN JS-->



    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
    @else
        <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/logo.jpg') }}" />
    @endif

    @yield('head')

    @section('seo')
        @if (! request()->is('/'))
            <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
        @endif
    @show

    @stack('css')

    {!! view_render_event('bagisto.shop.layout.head') !!}

</head>

@php
    $cart = cart()->getCart();
@endphp

<body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif style="scroll-behavior: smooth;">

    {!! view_render_event('bagisto.shop.layout.body.before') !!}

    <div id="app">
        <header>
                <div class="main_header">
                <div class="header_top">
                    <div class="header_top_logo">
                        <a href="/" {{--style="background-image: url({{asset('themes/bliss/assets/images/hg/hg_logo_'.app()->getLocale().'.png')}})"--}}>
                            <img src="{{asset('themes/bliss/assets/images/hg/hg_logo_'.app()->getLocale().'.png')}}" alt="">
                        </a>
                    </div>
                    <div class="header_top_search">
                        <div class="header_top_account_row">
                            @include('shop::partials.login-register-dropdown')
                            <ul class="header_top_price">
                                <li class="header_price">{{ $cart && $cart->base_grand_total ? core()->currency($cart->base_grand_total) : 0 }}</li>
{{--                                <li style="background-image: url('/themes/bliss/assets/images/hg/icons/gel.png')"></li>--}}
                            </ul>
                            <div class="header_top_shopping">
                                <a href="{{ route('shop.checkout.cart.index') }}" style="background-image: url('/themes/bliss/assets/images/hg/icons/shopping.png')"></a>
                                <div class="count">
                                    <p>{{ $cart ? $cart->items->count() : 0 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="header_top_search_row">
                            @include('shop::partials.search')
                        </div>
                    </div>
                </div>

                <ul class="header_navigation">
                    <li><a href="{{url('page/about-us')}}">{{ __('app.about_company') }}</a></li>
                    <li><a href="{{url('/products')}}">{{ __('app.products') }}</a></li>
{{--                    <li><a href="{{url('matrix')}}">{{ __('app.matrix') }}</a></li>--}}
                    {{-- <li><a href="javascript:;">Советы</a></li> --}}
                    <li><a href="{{url('page/payment-delivery')}}">{{ __('app.payment_delivery') }}</a></li>
                    <li><a href="{{url('page/contact-us')}}">{{ __('app.contact') }}</a></li>
                </ul>

                @include('shop::partials.locations-social-links')

            </div>
            <div class="mobile_header">
                <div class="mobile_header_container">
                    <div class="burger_menu_container">
                        <a href="javascript:;" class="burger_menu"
                           style="background-image: url('/themes/bliss/assets/images/hg/icons/menu_icon.png')"></a>
                    </div>
                    <a href="/" class="mobile_logo">
                        <img src="{{asset('themes/bliss/assets/images/hg/hg_logo_'.app()->getLocale().'.png')}}" alt="">
                    </a>
                    <ul class="right_side">
                        <li>
                            @include('shop::partials.login-register-dropdown', ['class' => 'mobile mobile-login-register-dropdown'])
                        </li>
                        <li>
                            <a href="{{ route('shop.checkout.cart.index') }}" class="shopping_icon"
                               style="background-image: url('/themes/bliss/assets/images/hg/icons/shopping.png')"></a>
                        </li>
                        <div class="count">
                            <p>{{ $cart ? $cart->items->count() : 0 }}</p>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="empty-div"></div>
        </header>
        <main>
            <flash-wrapper ref='flashes'></flash-wrapper>

            {!! view_render_event('bagisto.shop.layout.content.before') !!}

            @include('shop::partials.locations-social-links', ['class' => 'mobile_social'])

            @yield('content-wrapper')

            {!! view_render_event('bagisto.shop.layout.content.after') !!}

        </main>

        <footer>
            <ul>
                <li class="footer_social">
                    {!!core()->getCurrentChannel()->description!!}
                <li class="footer_navigation">
                    <a href="{{url('page/about-us')}}">{{ __('app.about_company') }}</a>
                    <a href="{{url('products')}}">{{ __('app.products') }}</a>
{{--                    <a href="{{route('matrix')}}">{{ __('app.matrix') }}</a>--}}
                    {{-- <a href="javascript:;">Советы</a> --}}
                    <a href="{{url('page/payment-delivery')}}">{{ __('app.payment_delivery') }}</a>
                    <a href="{{url('page/contact-us')}}">{{ __('app.contact') }}</a>
                </li>
            </ul>
        </footer>
{{--        <div class="main-container-wrapper">--}}

{{--            {!! view_render_event('bagisto.shop.layout.header.before') !!}--}}

{{--            @include('shop::layouts.header.index')--}}

{{--            {!! view_render_event('bagisto.shop.layout.header.after') !!}--}}

{{--            @yield('slider')--}}

{{--            <div class="content-container">--}}

{{--            </div>--}}

{{--        </div>--}}

{{--        {!! view_render_event('bagisto.shop.layout.footer.before') !!}--}}

{{--        @include('shop::layouts.footer.footer')--}}

{{--        {!! view_render_event('bagisto.shop.layout.footer.after') !!}--}}

{{--        @if (core()->getConfigData('general.content.footer.footer_toggle'))--}}
{{--            <div class="footer">--}}
{{--                <p style="text-align: center;">--}}
{{--                    @if (core()->getConfigData('general.content.footer.footer_content'))--}}
{{--                        {{ core()->getConfigData('general.content.footer.footer_content') }}--}}
{{--                    @else--}}
{{--                        {!! trans('admin::app.footer.copy-right') !!}--}}
{{--                    @endif--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
    {!! view_render_event('bagisto.shop.layout.body.after') !!}
    <div class="modal-overlay"></div>
    <ul class="mobile_menu">
        <li><a href="{{url('page/about-us')}}">{{ __('app.about_company') }}</a></li>
        <li><a href="{{url('products')}}">{{ __('app.products') }}</a></li>
{{--        <li><a href="{{route('matrix')}}">{{ __('app.matrix') }}</a></li>--}}
        <li><a href="{{url('page/payment-delivery')}}">{{ __('app.payment_delivery') }}</a></li>
        <li><a href="{{url('page/contact-us')}}">{{ __('app.contact') }}</a></li>
    </ul>

    <script src="/themes/bliss/assets/js/libs/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        window.flashMessages = [];

        @if ($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
        @elseif ($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif ($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }
            ];
        @elseif ($info = session('info'))
            window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }
            ];
        @endif

        window.serverErrors = [];
        @if(isset($errors))
            @if (count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        @endif
    </script>
    <script type="text/javascript" src="{{ bagisto_asset('js/shop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>
    <script src="/themes/bliss/assets/js/incrementDecrement.js"></script>
    <script src="/themes/bliss/assets/js/libs/popper.min.js"></script>
    <script src="/themes/bliss/assets/js/libs/bootstrap.min.js"></script>
    <script src="/themes/bliss/assets/js/index.js"></script>
    <script src="/themes/bliss/assets/js/libs/slick.min.js"></script>
    <script src="/themes/bliss/assets/js/slickSlider.js"></script>
    <script>
        let storage_cart_products = localStorage.getItem('cart_products');

        if(typeof storage_cart_products === 'string') {
            storage_cart_products = JSON.parse(storage_cart_products);

            axios.put('/api/checkout/cart/update', {
                qty: storage_cart_products
            }).then(function (res) {
                let {formated_base_sub_total} = res.data.data;
                $('.header_price').text(formated_base_sub_total);
                if(location.pathname !== "/checkout/cart") {
                    localStorage.removeItem('cart_products');
                }
            }).catch(function (data) {
                console.log('An error occurred.');
            });
        }
    </script>
    @stack('scripts')
</body>

</html>