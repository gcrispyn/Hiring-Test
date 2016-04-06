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
        ]
        // other pages ...
    ]
];
