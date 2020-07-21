{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}

{{-- <div class="product-card"> --}}

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>

    <div class="production_category_row_item">
                                                <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}"
                                                   style="position:relative; background-image: url({{$productBaseImage['medium_image_url']}})">
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

{{--
    @if ($product->new)
        <div class="sticker new">
            {{ __('shop::app.products.new') }}
        </div>
    @endif

    <div class="product-image">
        <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" title="{{ $product->name }}">
            <img src="{{ $productBaseImage['medium_image_url'] }}" onerror="this.src='{{ asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}'"/>
        </a>
    </div>

    <div class="product-information">

        <div class="product-name">
            <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}" title="{{ $product->name }}">
                <span>
                    {{ $product->name }}
                </span>
            </a>
        </div>

        @include ('shop::products.price', ['product' => $product])

        @include('shop::products.add-buttons', ['product' => $product])
    </div>
 --}}
{{-- </div> --}}

{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}