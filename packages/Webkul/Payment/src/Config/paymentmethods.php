<?php
return [
    'cashondelivery' => [
        'code' => 'cashondelivery',
        'title' => [
            'en' => 'Cash payment',
            'hy' => 'Կանխիկ վճարում',
            'ru' => 'Оплата наличными'
        ],
        'description' => [
            'en' => 'Cash payment on delivery',
            'hy' => 'Կանխիկ վճարում առաքման ժամանակ',
            'ru' => 'Оплата наличными при доставке',
        ],
        'class' => 'Webkul\Payment\Payment\CashOnDelivery',
        'active' => true,
        'sort' => 1
    ],

    'moneytransfer' => [
        'code' => 'moneytransfer',
        'title' => [
            'en' => 'Money transfer',
            'hy' => 'Դրամական փոխանցում',
            'ru' => 'Перевод денег'
        ],
        'description' => [
            'en' => 'Money transfer by card',
            'hy' => 'Դրամական փոխանցում քարտի միջոցով',
            'ru' => 'Денежный перевод по карте',
        ],
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