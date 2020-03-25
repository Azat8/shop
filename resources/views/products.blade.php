@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@extends('shop::layouts.master')

@php
    $channel = core()->getCurrentChannel();

    $homeSEO = $channel->home_seo;

    if (isset($homeSEO)) {
        $homeSEO = json_decode($channel->home_seo);

        $metaTitle = $homeSEO->meta_title;

        $metaDescription = $homeSEO->meta_description;

        $metaKeywords = $homeSEO->meta_keywords;
    }

    $categories = [];

    foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
        if ($category->slug)
            array_push($categories, $category);
    }

    $productRepository = app('Webkul\Product\Repositories\ProductRepository');
@endphp

@section('page_title')
    {{ isset($metaTitle) ? $metaTitle : "" }}
@endsection

@section('head')

    @if (isset($homeSEO))
        @isset($metaTitle)
            <meta name="title" content="{{ $metaTitle }}"/>
        @endisset

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}"/>
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}"/>
        @endisset
    @endif
@endsection

@section('content-wrapper')
    {!! view_render_event('bagisto.shop.home.content.before') !!}
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
            <li><a href="production.html">категории</a></li>
        </ul>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="production_header">
                        <p>КАТЕГОРИЯ</p>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="production_search" action="">
                        <input type="text" class="form-control" placeholder="search...">
                        <button>
                            <img src="/themes/bliss/assets/images/hg/icons/magnifying-glass-product.png" alt="magnifying-glass-product">
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="production_container">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="production_name_list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="/{{ $category->slug }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        @foreach($categories as $category)
                            <div class="production_category">
                                @php($products = $productRepository->getAll($category->id))
                                <h1>{{ $category->name }}</h1>

                                <div class="production_category_row">
                                    @foreach($products as $key => $product)
                                        @if($key < 2)
                                            @php($productBaseImage = $productImageHelper->getProductBaseImage($product))

                                            <div class="production_category_row_item">
                                                <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}"
                                                   style="background-image: url({{$productBaseImage['medium_image_url']}})"></a>
                                                <p>{{ $product->name }}</p>
                                                <ul>
                                                    <li>
                                                        <span>{!! $product->getTypeInstance()->getPriceHtml() !!}</span>
{{--                                                        <i class="production_price"--}}
{{--                                                           style="background-image: url('/themes/bliss/assets/images/hg/icons/geldark.png')"></i>--}}
                                                    </li>
                                                    <li>
                                                        <basket product_id="{{ $product->product_id }}"></basket>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="show_more_production">
                                    <a href="/{{ $category->slug }}" class="show_more_production_icon"
                                       style="background-image: url('/themes/bliss/assets/images/hg/icons/moreArrow.png')">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{ view_render_event('bagisto.shop.home.content.after') }}
@endsection

@push('scripts')
    <script type="text/x-template" id="basket-template">
        <i @click="addToCart()" class="production_icon"
           style="background-image: url('/themes/bliss/assets/images/hg/icons/shopping_blue.png'); cursor: pointer"></i>
    </script>
    <script>
        Vue.component('basket', {
            template: '#basket-template',
            props: {
                product_id: {
                    type: [Number, String]
                }
            },
            methods: {
                addToCart: function() {
                    var this_this = this;
                    $.ajax({
                        method: 'POST',
                        url: '/api/checkout/cart/add/'+this_this.product_id,
                        data: {
                            product_id: this_this.product_id,
                            quantity: 1,
                            is_configurable: false,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            window.flashMessages = [{
                                'type': 'alert-success',
                                'message': res.message
                            }];

                            this_this.$root.addFlashMessages();
                            $('.header_price').text(res.data.formated_sub_total);
                            $('.header_top_shopping .count p').text(res.data.items.length);
                        }
                    })
                }
            }
        });
    </script>
@endpush