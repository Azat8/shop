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
    <div class="home_slider">
        <div class="home_slider_container">
            @if (! empty($sliderData))
                @foreach ($sliderData as $index => $slider)

                    @php
                        $textContent = str_replace("\r\n", '', $slider['content']);
                    @endphp

                    <div class="home_slider_item"
                         style="background-image: url({{ url()->to('/') . '/storage/' . $slider['path'] }})"></div>
                @endforeach
            @else
                <div class="home_slider_item"
                     style="background-image: url({{ asset('/themes/velocity/assets/images/banner.png') }})"></div>
            @endif
        </div>
        <div class="prev-arrow arrow"
             style="background-image: url('/themes/bliss/assets/images/hg/icons/left-arrow.png')">
        </div>
        <div class="next-arrow arrow" style="background-image: url('/themes/bliss/assets/images/hg/icons/right.png')">
        </div>
    </div>
    <div class="home_products">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                @foreach (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts() as $productFlat)
                    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

                    <?php $productBaseImage = $productImageHelper->getProductBaseImage($productFlat); ?>

                    <div class="col-lg-4">
                        <div class="home_product_item">
                            <i style="position:relative;background-image: url({{ $productBaseImage['medium_image_url'] }})"><div class="overlay overlay-{{$productFlat->getTypeInstance()->haveSpecialPrice() ? 'sale' : ($productFlat->new ? 'new' : '')}}"></div></i>
                            <a href="{{ route('shop.productOrCategory.index', $productFlat->url_key) }}"
                               title="{{ $productFlat->name }}">
                                <p>{{ $productFlat->name }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="home_advantage_hg">
        <h1>{{__('app.home_why_we_choose')}}?</h1>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="home_advantage_hg_row">
                        <i style="background-image: url('/themes/bliss/assets/images/hg/icons/hg-logo-lighter-white.png')"></i>
                        <div class="home_advantage_hg_row_text">
                            <h1>{{__('app.home_section_title_1')}}</h1>
                            <p>{{__('app.home_section_text_1')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home_advantage_hg_row">
                        <i style="background-image: url('/themes/bliss/assets/images/hg/icons/hg-logo-lighter-blue.png')"></i>
                        <div class="home_advantage_hg_row_text">
                            <h1>{{__('app.home_section_title_2')}}</h1>
                            <p>
                                {{__('app.home_section_text_2')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home_advantage_hg_row">
                        <i style="background-image: url('/themes/bliss/assets/images/hg/icons/hg-logo-lighter-blue.png')"></i>
                        <div class="home_advantage_hg_row_text">
                            <h1>{{__('app.home_section_title_3')}}</h1>
                            <p>
                                {{__('app.home_section_text_3')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home_advantage_hg_row">
                        <i style="background-image: url('/themes/bliss/assets/images/hg/icons/hg-logo-lighter-yellow.png')"></i>
                        <div class="home_advantage_hg_row_text">
                            <h1>{{__('app.home_section_title_4')}}</h1>
                            <p>
                                {{__('app.home_section_text_4')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home_advantage_hg_row">
                        <i style="background-image: url('/themes/bliss/assets/images/hg/icons/hg-logo-lighter-gray.png')"></i>
                        <div class="home_advantage_hg_row_text">
                            <h1>{{__('app.home_section_title_5')}}</h1>
                            <p>
                                {{__('app.home_section_text_5')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home_advantage_hg_row">
                        <i style="background-image: url('/themes/bliss/assets/images/hg/icons/hg-logo-lighter-green.png')"></i>
                        <div class="home_advantage_hg_row_text">
                            <h1>{{__('app.home_section_title_6')}}</h1>
                            <p>
                                {{__('app.home_section_text_6')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    {!! DbView::make($channel)->field('home_page_content')->with(['sliderData' => $sliderData])->render() !!}--}}

    {{ view_render_event('bagisto.shop.home.content.after') }}

@endsection
