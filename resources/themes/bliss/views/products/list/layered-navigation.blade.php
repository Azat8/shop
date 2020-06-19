@inject ('attributeRepository', 'Webkul\Attribute\Repositories\AttributeRepository')

@inject ('productFlatRepository', 'Webkul\Product\Repositories\ProductFlatRepository')

@inject ('productRepository', 'Webkul\Product\Repositories\ProductRepository')

<?php
    $filterAttributes = [];

    if (isset($category)) {
        $products = $productRepository->getAll($category->id);

        $filterAttributes = $productFlatRepository->getFilterableAttributes($category, $products);
    }

    if (! count($filterAttributes) > 0) {
        $filterAttributes = $attributeRepository->getFilterAttributes();
    }

    foreach ($filterAttributes as $attribute) {
        if ($attribute->code <> 'price') {
            if (! $attribute->options->isEmpty()) {
                $attributes[] = $attribute;
            }
        } else {
            $attributes[] = $attribute;
        }
    }

    $filterAttributes = collect($attributes);
?>

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

    foreach ($model_category = app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
        if ($category->slug)
            array_push($categories, $category);
    }

    $productRepository = app('Webkul\Product\Repositories\ProductRepository');

    $category_name = '';

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
        <ul class="breadcrumb_navigation">
            <li><a href="/">{{__('app.home')}}</a></li>
            <li><a href="javascript:;">{{__('app.categories')}}</a></li>
        </ul>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="production_header">
                        <p>{{__('app.categories')}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="production_container">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="production_name_list">
                            @foreach($categories as $category)
                                @php
                                    $condition     = request()->segment(1) == $category->slug;

                                    if($condition){
                                        $category_name = $category->name;
                                    }
                                @endphp
                                <li class="{{$condition ? 'production_name_list_active' : ''}}">
                                    <a href="/{{ $category->slug }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-9">
                            <div class="production_category">
                                <h1>{{ $category_name }}</h1>
                                <div class="production_category_row">
                                    @foreach($products as $key => $product)

                                            @php($productBaseImage = $productImageHelper->getProductBaseImage($product))
                                            <div class="production_category_row_item">
                                                <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}"
                                                   style="position:relative;background-image: url({{$productBaseImage['medium_image_url']}})">
                                                       <div class="overlay overlay-{{$product->getTypeInstance()->haveSpecialPrice() ? 'sale' : ($product->new ? 'new' : '')}}"></div>
                                                   </a>
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

                                    @endforeach
                                </div>

                                {{$products->links()}}

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    {{ view_render_event('bagisto.shop.home.content.after') }}
@endsection
