@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('content-wrapper')
    <main>
        <ul class="breadcrumb_navigation">
            <li><a href="/">{{__('app.home')}}</a></li>
            <li><a href="javascript:;">{{__('app.profile_details')}}</a></li>
        </ul>
        <div class="account">
            <h1>{{__('app.profile_title')}}</h1>
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
