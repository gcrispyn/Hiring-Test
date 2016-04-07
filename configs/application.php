<?php
use SSENSE\HiringTest\Models\Country;
use SSENSE\HiringTest\Models\Category;
use SSENSE\HiringTest\Models\Currency;
use SSENSE\HiringTest\Models\Price;
use SSENSE\HiringTest\Models\Product;
use SSENSE\HiringTest\Models\Stock;
use VertigoLabs\Overcast\Overcast;
return [
    'services' => [
        'countries'  => Country::class,
        'categories' => Category::class,
        'currencies' => Currency::class,
        'prices'     => Price::class,
        'products'   => Product::class,
        'stocks'     => Stock::class,
        'overcast'   => [
            'class'     => Overcast::class,
            'arguments' => ['e60efe99b1bf9036ce9a154a5c1c10ee'] 
        ]
    ],
    'cities' => [
        'montreal' => [
            'latitude'  => 45.5087,
            'longitude' => -73.554 
        ]
    ],
    'menu' => [
        [
            'title' => 'Home',
            'url'   => '/',
            'name'  => 'homepage'
        ],
                [
            'title' => 'Canadian Products',
            'url'   => '/canadian-products',
            'name'  => 'canadianProducts'
        ],
                [
            'title' => 'Montreal weather',
            'url'   => '/montreal-weather/7',
            'name'  => 'montrealWeather'
        ]
    ]
];