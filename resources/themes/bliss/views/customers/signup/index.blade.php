@extends('shop::layouts.master')
@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection
@section('content-wrapper')

<main>
    <ul class="breadcrumb_navigation">
        <li><a href="/">{{ __('app.home') }}</a></li>
        <li><a href="{{ route('customer.register.index') }}">{{ __('shop::app.header.sign-up') }}</a></li>
    </ul>
    <div class="sign_up">
        <div class="sign_up_container">
            <form class="sign_up_form physical" method="post" action="{{ route('customer.register.create') }}" @submit.prevent="onSubmit">
                {{ csrf_field() }}

                <div class="sign_up_name_surname">
                    <div class="form-group">
                        <input type="text" class="form-control" :class="[errors.has('first_name') ? 'has-error' : '']" placeholder="{{ __('shop::app.customer.signup-form.firstname') }}" name="first_name" v-validate="'required'" value="{{ old('first_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;">
                        <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" :class="[errors.has('last_name') ? 'has-error' : '']" placeholder="{{ __('shop::app.customer.signup-form.lastname') }}" name="last_name" v-validate="'required'" value="{{ old('last_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">
                        <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                    </div>
                </div>
{{--                <div class="form-group">--}}
{{--                    <select class="form-control">--}}
{{--                        <option selected value="0">Recommended by</option>--}}
{{--                        <option>0011</option>--}}
{{--                        <option>0012</option>--}}
{{--                        <option>0013</option>--}}
{{--                        <option>0014</option>--}}
{{--                        <option>0015</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class="form-group">
                    <input type="text" class="form-control" :class="[errors.has('phone') ? 'has-error' : '']" placeholder="{{ __('shop::app.customer.account.address.create.phone') }}" name="phone" v-validate="'required'" value="{{ old('phone') }}" data-vv-as="&quot;{{ __('shop::app.customer.account.address.create.phone') }}&quot;">
                    <span class="control-error" v-if="errors.has('phone')">@{{ errors.first('phone') }}</span>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;" placeholder="{{ __('shop::app.customer.signup-form.email') }}">
                    <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" v-validate="'required|min:6'" ref="password" placeholder="{{ __('shop::app.customer.signup-form.password') }}" value="{{ old('password') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;" :class="[errors.has('password') ? 'has-error' : '']">
                    <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                </div>
                <div class="form-group">
                    <input type="password" :class="[errors.has('password_confirmation') ? 'has-error' : '']" class="form-control" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;" placeholder="{{ __('shop::app.customer.signup-form.confirm_pass') }}">
                    <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control address_input" :class="[errors.has('address1') ? 'has-error' : '']" placeholder="{{ __('shop::app.customer.signup-form.address') }}" name="address1" v-validate="'required'" value="{{ old('address1') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.address') }}&quot;">
                    <span class="control-error" v-if="errors.has('address1')">@{{ errors.first('address1') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control home_input" :class="[errors.has('home') ? 'has-error' : '']" placeholder="{{ __('shop::app.customer.signup-form.home') }}" name="home" v-validate="'required'" value="{{ old('home') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.home') }}&quot;">
                    <span class="control-error" v-if="errors.has('home')">@{{ errors.first('home') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control city_input" :class="[errors.has('city') ? 'has-error' : '']" placeholder="{{ __('shop::app.customer.signup-form.city') }}" name="city" v-validate="'required'" value="{{ old('city') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.city') }}&quot;">
                    <span class="control-error" v-if="errors.has('city')">@{{ errors.first('city') }}</span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control index_input" :class="[errors.has('postcode') ? 'has-error' : '']" placeholder="{{ __('shop::app.customer.signup-form.index') }}" name="postcode" v-validate="'required'" value="{{ old('postcode') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.index') }}&quot;">
                    <span class="control-error" v-if="errors.has('postcode')">@{{ errors.first('postcode') }}</span>
                </div>
                <button type="submit" class="btn btn_send_form">
                    {{ __('shop::app.customer.signup-form.button_title') }}
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
