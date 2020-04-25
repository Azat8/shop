<div class="row">
    <div class="col-lg-12">
        <h2>{{__('app.profile_details')}}</h2>
    </div>
</div>

<form method="post" action="{{ route('customer.profile.edit') }}" @submit.prevent="onSubmit">


    <div class="row">

        @csrf

        {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}

        <div class="col-lg-6">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control user_info"
                    placeholder="{{ __('shop::app.customer.account.profile.fname') }}"
                    name="first_name"
                    value="{{ old('first_name') ?? $customer->first_name }}" v-validate="'required'"
                    data-vv-as="&quot;{{ __('shop::app.customer.account.profile.fname') }}&quot;"
                />
                <span class="control-error"
                      v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text"
                       class="form-control user_info"
                       placeholder="{{ __('shop::app.customer.account.profile.lname') }}"
                       :class="[errors.has('last_name') ? 'has-error' : '']" name="last_name"
                       value="{{ old('last_name') ?? $customer->last_name }}" v-validate="'required'"
                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.lname') }}&quot;">
                <span class="control-error"
                      v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password"
                       class="form-control user_info"
                       placeholder="{{ __('shop::app.customer.account.profile.opassword') }}"
                       :class="[errors.has('oldpassword') ? 'has-error' : '']"
                       name="oldpassword"
                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.opassword') }}&quot;"
                       v-validate="'min:6'">
                <span class="control-error"
                      v-if="errors.has('oldpassword')">@{{ errors.first('oldpassword') }}</span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password"
                       class="form-control user_info"
                       placeholder="{{ __('shop::app.customer.account.profile.password') }}"
                       :class="[errors.has('password') ? 'has-error' : '']"
                       name="password"
                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.password') }}&quot;"
                       v-validate="'min:6'">
                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password"
                       class="form-control user_info"
                       placeholder="{{ __('shop::app.customer.account.profile.cpassword') }}"
                       name="password_confirmation"
                       data-vv-as="&quot;{{ __('shop::app.customer.account.profile.cpassword') }}&quot;"
                       v-validate="'min:6|confirmed:password'">
                <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control user_info"
                    placeholder="{{ __('shop::app.customer.account.profile.phone') }}"
                    name="phone"
                    value="{{ old('phone') ?? $customer->phone }}" v-validate="'required'"
                    data-vv-as="&quot;{{ __('shop::app.customer.account.profile.phone') }}&quot;"
                />
                <span class="control-error"
                      v-if="errors.has('first_name')">@{{ errors.first('phone') }}</span>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <input type="text"
                       class="form-control user_info"
                       :class="[errors.has('address1') ? 'has-error' : '']"
                       placeholder="{{ __('shop::app.customer.signup-form.address') }}"
                       name="address1"
                       v-validate="'required'"
                       value="{{ old('address1') ?? $customer->addresses[0]['address1']}}"
                       data-vv-as="&quot;{{ __('shop::app.customer.signup-form.address') }}&quot;">
                <span class="control-error" v-if="errors.has('address1')">@{{ errors.first('address1') }}</span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <input type="text"
                       class="form-control user_info"
                       :class="[errors.has('home') ? 'has-error' : '']"
                       placeholder="{{ __('shop::app.customer.signup-form.home') }}"
                       name="home"
                       v-validate="'required'"
                       value="{{ old('home') ?? $customer->addresses[0]['home'] }}"
                       data-vv-as="&quot;{{ __('shop::app.customer.signup-form.home') }}&quot;">
                <span class="control-error" v-if="errors.has('home')">@{{ errors.first('home') }}</span>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <input type="text"
                       class="form-control user_info"
                       :class="[errors.has('city') ? 'has-error' : '']"
                       placeholder="{{ __('shop::app.customer.signup-form.city') }}"
                       name="city"
                       v-validate="'required'"
                       value="{{ old('city') ?? $customer->addresses[0]['city'] }}"
                       data-vv-as="&quot;{{ __('shop::app.customer.signup-form.city') }}&quot;">
                <span class="control-error" v-if="errors.has('city')">@{{ errors.first('city') }}</span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <input type="text"
                       class="form-control user_info"
                       :class="[errors.has('postcode') ? 'has-error' : '']"
                       placeholder="{{ __('shop::app.customer.signup-form.index') }}"
                       name="postcode"
                       v-validate="'required'"
                       value="{{ old('postcode') ?? $customer->addresses[0]['postcode'] }}"
                       data-vv-as="&quot;{{ __('shop::app.customer.signup-form.index') }}&quot;">
                <span class="control-error" v-if="errors.has('postcode')">@{{ errors.first('postcode') }}</span>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit"
                    class="btn submit_profile">{{ __('shop::app.customer.account.profile.submit') }}</button>
        </div>
    </div>

</form>

