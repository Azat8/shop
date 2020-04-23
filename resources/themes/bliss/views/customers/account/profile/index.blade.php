@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('content-wrapper')
    <main>
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
