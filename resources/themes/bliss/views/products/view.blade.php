@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
@php($images = $productImageHelper->getGalleryImages($product))
@php($productBaseImage = $productImageHelper->getProductBaseImage($product))

@extends('shop::layouts.master')

@section('page_title')
    {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
@stop

@section('seo')
    <meta name="description"
          content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"/>
    <meta name="keywords" content="{{ $product->meta_keywords }}"/>
    <style>
        .production_single_image li button {
            opacity: 0;
        }

        .production_single_image .slick-dots li {
            width: 70px;
            height: 70px;
            background-size: cover;
            background-color: #fff;
        }

        .slick-dots {
            position: inherit;
            margin-top: 0 !important;
            text-align: left;
            margin-bottom: 10px;
        }
    </style>
@stop

@section('content-wrapper')

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

    <main>
        <ul class="breadcrumb_navigation">
            @php($category = Webkul\Product\Models\Product::find($product->product_id)->categories)
            @php($category = count($category) ? $category[0] : null)


            <li><a href="/">{{ __('app.home') }}</a></li>
            @if($category)
            <li><a href="/{{ $category->slug }}">{{ $category->name }}</a></li>
            @endif
            <li><a href="{{ route('shop.productOrCategory.index', $product->url_key) }}">{{ $product->name }}</a></li>
        </ul>
        <div class="production_single">
            <h1>{{ $product->name }}</h1>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-xl-4">
                        <div class="production_single_image">
                            <div class="product-slider">
                                @foreach($images as $image)
                                    <div>
                                        <i style="background-image: url({{ $image['medium_image_url'] }})"></i>
                                    </div>
                                @endforeach
                            </div>
                            <p class="volume"><span> {{ $product->volume }}</span></p>
                            <div class="dots"></div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-8">
                        <form method="POST" class="production_single_text"
                              action="{{ route('cart.add', $product->product_id) }}">
                            <p>{!! $product->description !!} </p>
                            <a href="#instruction">> {{ __('app.see_about') }}</a>
                            <input type="hidden" name="is_buy_now">
                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                            @csrf
                            <ul>
                                <li>
                                    <span class="product_price">{!! $product->getTypeInstance()->getPriceHtml() !!}</span>
                                </li>
                                <li>
                                    <quantity-changer
                                        :control-name="'qty[{{$product->id}}]'"
                                        max="{{ $product->product->inventories->first()->qty }}"
                                        quantity="1">
                                    </quantity-changer>
                                    <button type="submit" class="btn order_online">
                                        {{ __('app.order_online') }}
                                        <i style="background-image: url('/themes/bliss/assets/images/hg/icons/shopping-white-single.png')"></i>
                                    </button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="production_instruction">
                <h1 id="instruction">{{ __('app.instruction') }}</h1>
                <p>{!! $product->short_description !!} </p>
            </div>
            @if($product->related_products()->count())
                <div class="production_category">
                    <h1>{{ __('app.similar_products') }}</h1>
                    <div class="production_category_row">
                        @foreach($product->related_products()->get() as $prod)
                            @php($prodBaseImage = $productImageHelper->getProductBaseImage($prod))
                            <div class="production_category_row_item">
                                <a href="{{ route('shop.productOrCategory.index', $prod->url_key) }}"
                                   style="background-image: url({{ $prodBaseImage['medium_image_url'] }})"></a>
                                <p>{{ $prod->name }}</p>
                                <ul>
                                    <li>
                                        <span>{!! $prod->getTypeInstance()->getPriceHtml() !!}</span>
                                        <i class="production_price"
                                           style="background-image: url('/themes/bliss/assets/images/hg/icons/geldark.png')"></i>
                                    </li>
                                    <li>
                                        <i class="production_icon"
                                           style="background-image: url('/themes/bliss/assets/images/hg/icons/shopping_blue.png')"></i>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </main>

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}
@endsection

@push('scripts')

    <script type="text/x-template" id="quantity-changer-template">
        <div class="input-group" :class="[errors.has(controlName) ? 'has-error' : '']">
             <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number"
                        @click="decreaseQty()">
                    <span class="glyphicon glyphicon-minus">-</span>
                </button>
            </span>
            <input :name="controlName" class="control" :value="qty" v-validate="'required|numeric|min_value:1'"
                   data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;" readonly class="quantity form-control input-number">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number"
                        @click="increaseQty()">
                    <span class="glyphicon glyphicon-plus">+</span>
                </button>
            </span>
            <span class="control-error" v-if="errors.has(controlName)">@{{ errors.first(controlName) }}</span>
        </div>
    </script>

    <script>
        Vue.component('quantity-changer', {
            template: '#quantity-changer-template',

            inject: ['$validator'],

            props: {
                controlName: {
                    type: String,
                    default: 'quantity'
                },

                quantity: {
                    type: [Number, String],
                    default: 1
                },

                minQuantity: {
                    type: [Number, String],
                    default: 1
                },

                max: {
                    type: [Number, String],
                    default: 1
                },

                validations: {
                    type: String,
                    default: 'required|numeric|min_value:1'
                }
            },

            data: function() {
                return {
                    qty: this.quantity
                }
            },

            watch: {
                quantity: function (val) {
                    this.qty = val;

                    this.$emit('onQtyUpdated', this.qty)
                }
            },

            methods: {
                decreaseQty: function() {
                    if (this.qty > this.minQuantity)
                        this.qty = parseInt(this.qty) - 1;

                    this.$emit('onQtyUpdated', this.qty)
                },

                increaseQty: function() {
                    if(parseInt(this.qty) < parseInt(this.max)) {
                        this.qty = parseInt(this.qty) + 1;
                        this.qty_changed = true;
                    }

                    this.$emit('onQtyUpdated', this.qty);
                }
            }
        });

    </script>
@endpush

