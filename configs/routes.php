<?php

return [
    'routing.routes' => [
        
        // Homepage
        'homepage' => [
            'pattern' => '/',
            'controller' => 'SSENSE\HiringTest\Controllers\HomepageController::displayAction',
            'method' => ['get']
        ]
        // other pages ...
    ]
];
