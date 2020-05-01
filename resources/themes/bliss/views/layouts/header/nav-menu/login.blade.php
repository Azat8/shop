

{{--        <div id="account">--}}

{{--            <div class="welcome-content pull-right" @click="togglePopup">--}}
{{--                <i class="material-icons align-vertical-top">perm_identity</i>--}}
{{--                <span class="text-center">--}}
{{--                    @guest('customer')--}}
{{--                        {{ __('velocity::app.header.welcome-message', ['customer_name' => trans('velocity::app.header.guest')]) }}!--}}
{{--                    @endguest--}}

{{--                    @auth('customer')--}}
{{--                        {{ __('velocity::app.header.welcome-message', ['customer_name' => auth()->guard('customer')->user()->first_name]) }}--}}
{{--                    @endauth--}}
{{--                </span>--}}
{{--                <span class="select-icon rango-arrow-down"></span>--}}
{{--            </div>--}}

{{--        </div>--}}


            <!--Content-->
            @guest('customer')
                <form method="POST" action="{{ route('customer.session.create') }}">
                    {{ csrf_field() }}
                    <div class="form-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label>
                            <input type="text" class="form-control input-default"
                                   placeholder="{{ __('shop::app.customer.login-form.email') }}" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                            <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                        </label>

                    </div>
                    <div class="form-group" :class="[errors.has('password') ? 'has-error' : '']">
                        <label>
                            <input type="password" class="form-control input-default"
                                   placeholder="{{ __('shop::app.customer.login-form.password') }}" v-validate="'required|min:6'" v-validate="'required|min:6'" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;" value="">
                            <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>

                        </label>
                    </div>
                    <button type="submit" class="btn sign_in_btn">{{ __('shop::app.customer.login-form.button_title') }}</button>
                    <a href="{{ route('customer.forgot-password.create') }}" class="forgot_btn">{{ __('shop::app.customer.login-form.forgot_pass') }}</a>
                    <p>{{ __('shop::app.customer.login-form.not_account_yet') }}</p>
                    <a href="{{ route('customer.register.index') }}" class="btn register_btn">{{ __('shop::app.header.sign-up') }}</a>
                </form>

            @endguest

            @auth('customer')
{{--                <a href="">--}}
{{--                    {{ auth()->guard('customer')->user()->first_name }}--}}
{{--                </a>--}}
{{--                <div class="modal-content customer-options">--}}
{{--                    <div class="customer-session">--}}
{{--                        <label class="">--}}
{{--                            {{ auth()->guard('customer')->user()->first_name }}--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <ul type="none">--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('customer.profile.index') }}" class="unset">{{ __('shop::app.header.profile') }}</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="{{ route('customer.orders.index') }}" class="unset">{{ __('velocity::app.shop.general.orders') }}</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="{{ route('customer.wishlist.index') }}" class="unset">{{ __('shop::app.header.wishlist') }}</a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a href="{{ route('customer.session.destroy') }}" class="unset">{{ __('shop::app.header.logout') }}</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
        @endauth
        <!--/.Content-->
