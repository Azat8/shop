<div class="col-12">
    <h1>{{ __('app.details') }}</h1>
</div>

<div class="form-container row">
    <div class="col-lg-6">
        <div class="form-group" :class="[errors.has('address-form.billing[city]') ? 'has-error' : '']">
            <select name="billing[city]"  v-validate="'required'" v-model="dataShippingKey" class="form-control" @change="updateSummaryCart($event)">
                @foreach(config('cities') as $key => $city)
                    <option value="{{$key}}">{{$city['locales'][app()->getLocale()]}} - {{$city['price']}} AMD</option>
                @endforeach
            </select>
            <span class="control-error" v-if="errors.has('address-form.billing[city]')">
                @{{ errors.first('address-form.billing[city]') }}
            </span>
        </div>
    </div>
{{--    <div class="col-lg-9">--}}
{{--        <div class="form-group" :class="[errors.has('address-form.billing[address1][]') ? 'has-error' : '']">--}}

{{--            <input @change="validateAddressForm" type="text" v-validate="'required'" placeholder="{{ __('shop::app.checkout.onepage.shipping-address') }}" class="control form-control user_info" id="billing_address_0" name="billing[address1][]" v-model="address.billing.address1[0]" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.shipping-address') }}&quot;"/>--}}

{{--            <span class="control-error" v-if="errors.has('address-form.billing[address1][]')">--}}
{{--                @{{ errors.first('address-form.billing[address1][]') }}--}}
{{--            </span>--}}
{{--        </div>--}}

{{--    </div>--}}

    <div class="col-lg-6">
        <div class="form-group" :class="[errors.has('address-form.billing[apartment]') ? 'has-error' : '']">

            <input @change="validateAddressForm" type="text" v-validate="'required'" placeholder="{{ __('shop::app.checkout.onepage.house') }}  " class="control form-control user_info" id="billing_apartment" name="billing[apartment]" v-model="address.billing.address2" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.house') }}&quot;"/>

            <span class="control-error" v-if="errors.has('address-form.billing[apartment]')">
                @{{ errors.first('address-form.billing[apartment]') }}
            </span>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group" :class="[errors.has('address-form.billing[first_name]') ? 'has-error' : '']">

            <input @change="validateAddressForm" type="text" v-validate="'required'" placeholder="{{ __('shop::app.checkout.onepage.first-name') }}" class="control form-control user_info" id="billing_first_name" name="billing[first_name]" v-model="address.billing.first_name" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.first-name') }}&quot;"/>

            <span class="control-error" v-if="errors.has('address-form.billing[first_name]')">
                @{{ errors.first('address-form.billing[first_name]') }}
            </span>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group" :class="[errors.has('address-form.billing[last_name]') ? 'has-error' : '']">

            <input @change="validateAddressForm" type="text" v-validate="'required'" placeholder="{{ __('shop::app.checkout.onepage.last-name') }}" class="control form-control user_info" id="billing_last_name" name="billing[last_name]" v-model="address.billing.last_name" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.last-name') }}&quot;"/>

            <span class="control-error" v-if="errors.has('address-form.billing[last_name]')">
                @{{ errors.first('address-form.billing[last_name]') }}
            </span>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group" :class="[errors.has('address-form.billing[phone]') ? 'has-error' : '']">

            <input @change="validateAddressForm" type="text" v-validate="'required'" placeholder="{{ __('shop::app.checkout.onepage.phone') }}" class="control form-control user_info" id="billing_phone" name="billing[phone]" v-model="address.billing.phone" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.phone') }}&quot;"/>

            <span class="control-error" v-if="errors.has('address-form.billing[phone]')">
                @{{ errors.first('address-form.billing[phone]') }}
            </span>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group" :class="[errors.has('address-form.billing[email]') ? 'has-error' : '']">

            <input @change="validateAddressForm" type="text" v-validate="'required'" placeholder="{{ __('shop::app.checkout.onepage.email') }}" class="control form-control user_info" id="billing_email" name="billing[email]" v-model="address.billing.email" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.email') }}&quot;"/>

            <span class="control-error" v-if="errors.has('address-form.billing[email]')">
                @{{ errors.first('address-form.billing[email]') }}
            </span>
        </div>
    </div>
</div>