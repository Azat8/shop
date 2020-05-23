<?php

return [
    'bank_admin' => [
        'url' => 'https://ipay.arca.am/payment/admin/',
        'login' => '34543495_admin',
        'password' => '9]GEDf{;7]~wevyB'
    ],
    'bank_api' => [
        'url' => 'https://ipay.arca.am/payment/rest/',
        'login' => '34543495_api',
        'password' => 'mBxYhy5XqQEs887s'
    ],
    'methods' => [
        'get_status' => 'getOrderStatusExtended.do?',
        'order_register' => 'register.do?'
    ],
    'statuses' => [
        '0' => ['hy' => 'Գրանցված է բայց չվճարված:', 'ru' => 'Заказ зарегистрирован, но не оплачен', 'en' => 'Order registered but not paid'],
        '1' => ['hy' => 'Գումարը սառեցվել է քարտի վրա (երկուփուլանի վճարման համար)', 'ru' => 'Деньги были захолдированы на карте (для двухстадийных платежей)', 'en' => 'Money was held on the card (for two-stage payments)'],
        '2' => ['hy' => 'Պատվերի գումարի ամբողջական թույլտվություն', 'ru' => 'Проведена полная авторизация суммы заказа', 'en' => 'Complete authorization of the order amount'],
        '3' => ['hy' => 'Պատվերի Վճարումը չեղարկվեց', 'ru' => 'Авторизация отменена', 'en' => 'Authorization Canceled'],
        '4' => ['hy' => 'Վերադարձի գործողություն է իրականացվել գործարքի վերաբերյալ', 'ru' => 'По транзакции была проведена операция возврата', 'en' => 'A return operation was performed on a transaction'],
        '5' => ['hy' => 'Թողարկող բանկի ACS- ի միջոցով նախաձեռնված թույլտվություն', 'ru' => 'Инициирована авторизация через ACS банка-эмитента', 'en' => 'Authorization initiated through ACS of the issuing bank'],
        '6' => ['hy' => 'Պատվերի Վճարումը մերժվել է', 'ru' => 'Авторизация отклонена', 'en' => 'Authorization rejected'],
    ]
];