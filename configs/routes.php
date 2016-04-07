<?php

return [
    'routing.routes' => [
        
        // Homepage
        'homepage' => [
            'pattern' => '/',
            'controller' => 'SSENSE\HiringTest\Controllers\HomepageController::displayAction',
            'method' => ['get']
        ],
        'canadianProducts' => [
            'pattern' => '/canadian-products',
            'controller' => 'SSENSE\HiringTest\Controllers\HomepageController::canadianProductsAction',
            'method' => ['get']
        ],
        'montrealWeather' => [
            'pattern' => '/montreal-weather/{daysNumber}',
            'controller' => 'SSENSE\HiringTest\Controllers\HomepageController::montrealWeatherAction',
            'method' => ['get'],
            'assert' => [
                'daysNumber' => '^[1-7]{1}$'
            ]
        ]
        // other pages ...
    ]
];
