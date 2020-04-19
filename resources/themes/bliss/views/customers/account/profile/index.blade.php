@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('content-wrapper')
    <main>
        <ul class="header_social mobile_social">
            <li class="languages">
                <a href="javascript:;" class="arm_icon" style="background-image: url('assets/icons/ge.png')"></a>
                <a href="javascript:;" class="eng_icon" style="background-image: url('assets/icons/en.png')"></a>
                <a href="javascript:;" class="rus_icon" style="background-image: url('assets/icons/ru.png')"></a>
            </li>
            <li class="social">
                <a href="javascript:;" class="facebook_icon" style="background-image: url('assets/icons/facebook-icon.png')"></a>
                <a href="javascript:;" class="youtube_icon" style="background-image: url('assets/icons/youtube-icon.png')"></a>
                <a href="javascript:;" class="instagram_icon" style="background-image: url('assets/icons/instagram-icon.png')"></a>
            </li>
        </ul>
        <ul class="breadcrumb_navigation">
            <li><a href="index.html">Главная</a></li>
            <li><a href="about-us.html">Детали профиля</a></li>
        </ul>
        <div class="account">
            <h1>МОЙ ПРОФИЛЬ</h1>
            <div class="sign_out_btn">
                <a
                    href="{{ route('customer.session.destroy') }}">
                    {{ __('shop::app.header.logout') }}
                </a>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        @include('shop::customers.account.orders.index')
                    </div>
                    <div class="col-lg-6">
                        @include('shop::customers.account.profile.edit')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
