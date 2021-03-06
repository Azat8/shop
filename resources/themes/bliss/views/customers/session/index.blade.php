@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
@endsection

@section('content-wrapper')

    <div class="auth-content sign_up">
        <div class="sign-up-text">
            {{ __('shop::app.customer.login-text.no_account') }} - <a href="{{ route('customer.register.index') }}">{{ __('shop::app.customer.login-text.title') }}</a>
        </div>

        {!! view_render_event('bagisto.shop.customers.login.before') !!}
        <div class="sign_up_container">
            <form method="POST" action="{{ route('customer.session.create') }}" class="sign_up_form physical">
            {{ csrf_field() }}
            <div class="login-form">
                <div class="login-text mt-2 mb-2">{{ __('shop::app.customer.login-form.title') }}</div>

                {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}

                <div class="control-group form-group" :class="[errors.has('email') ? 'has-error' : '']">
                    <label for="email" class="required">{{ __('shop::app.customer.login-form.email') }}</label>
                    <input type="text" class="control form-control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                    <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                </div>

                <div class="control-group form-group" :class="[errors.has('password') ? 'has-error' : '']">
                    <label for="password" class="required">{{ __('shop::app.customer.login-form.password') }}</label>
                    <input type="password" v-validate="'required|min:6'" class="control form-control" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;" value=""/>
                    <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                </div>

                {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}

                <div class="forgot-password-link">
                    <a href="{{ route('customer.forgot-password.create') }}">{{ __('shop::app.customer.login-form.forgot_pass') }}</a>

                    <div class="mt-10">
                        @if (Cookie::has('enable-resend'))
                            @if (Cookie::get('enable-resend') == true)
                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                            @endif
                        @endif
                    </div>
                </div>

                <input class="btn btn_send_form mt-3" type="submit" value="{{ __('shop::app.customer.login-form.button_title') }}">
            </div>
        </form>
        </div>
        {!! view_render_event('bagisto.shop.customers.login.after') !!}
    </div>

@stop

