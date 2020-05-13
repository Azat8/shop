@foreach (Webkul\Payment\Facades\Payment::getPaymentMethods() as $payment)
    <div class="">
        <ul class="delivery_cont">
            <li class="{{$payment['method']}}">
                <div class="form-check">
                    <input v-validate="'required'" type="radio" id="{{ $payment['method'] }}" name="payment[method]" value="{{ $payment['method'] }}" v-model="payment.method" @change="methodSelected()" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.payment-method') }}&quot;" :disabled="!$parent.address_form_validate">

                    <label class="form-check-label" for="cash">{{ $payment['method_title'] }}</label>
                </div>
                <p>{{ __($payment['description']) }}</p>
            </li>
        </ul>
    </div>
@endforeach
