<?php

return [
    'express' => [
        'code' => 'express',
        'title' => 'Express Shipping',
        'description' => 'Express Shipping',
        'active' => true,
        'default_rate' => '0',
        'price' => '0',
        'class' => 'Webkul\Shipping\Carriers\Express'
    ],

    'flatrate' => [
        'code' => 'flatrate',
        'title' => 'Courier Shipping',
        'description' => 'Courier Shipping',
        'active' => true,
        'default_rate' => '10',
//        'type' => 'per_unit',
        'price' => '0',
        'class' => 'Webkul\Shipping\Carriers\FlatRate'
    ],

    'free' => [
        'code' => 'free',
        'title' => 'Self pickup',
        'description' => 'Self pickup',
        'active' => true,
        'default_rate' => '0',
        'price' => '0',
        'class' => 'Webkul\Shipping\Carriers\Free'
    ]
];