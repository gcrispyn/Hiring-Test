<?php
use SSENSE\HiringTest\Models\Country;
use SSENSE\HiringTest\Models\Category;
use SSENSE\HiringTest\Models\Currency;
use SSENSE\HiringTest\Models\Price;
use SSENSE\HiringTest\Models\Product;
use SSENSE\HiringTest\Models\Stock;
return [
    'services' => [
        'countries'  => Country::class,
        'categories' => Category::class,
        'currencies' => Currency::class,
        'prices'     => Price::class,
        'products'   => Product::class,
        'stocks'     => Stock::class
    ]
];