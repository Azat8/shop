<?php
return [
    'cashondelivery' => [
        'code' => 'cashondelivery',
        'title' => 'Կանխիկ վճարում',
        'description' => 'Կանխիկ վճարում առաքման ժամանակ',
        'class' => 'Webkul\Payment\Payment\CashOnDelivery',
        'active' => true,
        'sort' => 1
    ],

    'moneytransfer' => [
        'code' => 'moneytransfer',
        'title' => 'Դրամական փոխանցում',
        'description' => 'Դրամական փոխանցում քարտի միջոցով',
        'class' => 'Webkul\Payment\Payment\MoneyTransfer',
        'active' => true,
        'sort' => 2
    ],

//    'paypal_standard' => [
//        'code' => 'paypal_standard',
//        'title' => 'Paypal Standard',
//        'description' => 'Paypal Standard',
//        'class' => 'Webkul\Paypal\Payment\Standard',
//        'sandbox' => true,
//        'active' => true,
//        'business_account' => 'test@webkul.com',
//        'sort' => 3
//    ]
];