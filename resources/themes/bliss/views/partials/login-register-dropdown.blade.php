<div class="dropdown {{isset($class) ? $class : ''}}">
    <button class="btn account_btn dropdown-toggle" type="button" id="dropdownAccount"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="/themes/bliss/assets/images/hg/icons/account.png" alt="account_icon"/>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownAccount">
        @auth('customer')
            <div class="sign_out_btn">
                <a href="{{ route('customer.session.destroy') }}">
                    {{ __('shop::app.header.logout') }}
                </a> |
                <a href="{{url('customer/account/profile')}}">
                    {{__('app.profile_title')}}
                </a>
            </div>
        @else    
            @include('shop::layouts.header.nav-menu.login')
        @endauth
    </div>
</div>