<?php
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Response;
use Igorw\Silex\ConfigServiceProvider;
use MJanssen\Provider\RoutingServiceProvider;

// Display all errors: should be on to prove that you are writing good code!
error_reporting(E_ALL);

// Class autoloader from composer
require_once __DIR__ . '/../../vendor/be/autoload.php';

// Create the application
$app = new Application();

// Register the routing into the application
$app->register(
    new ConfigServiceProvider(__DIR__ . '/../../configs/routes.php')
);
$app->register(new RoutingServiceProvider('routing.routes'));

// Initiate MySQL databse connexion
$app->register(
    new ConfigServiceProvider(__DIR__ . '/../../configs/mysql.php')
);

$app->register(
    new ConfigServiceProvider(__DIR__ . '/../../configs/application.php')
);
$app->register(new Silex\Provider\DoctrineServiceProvider(), $app['db.options']);

// Initiate Twig within the application for tempalte rendering
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));

// Initiate the cache
$app->register(new Moust\Silex\Provider\CacheServiceProvider(), array(
    'cache.options' => array(
        'filesystem' => array(
            'driver' => 'redis',
            'cache_dir' => './tmp'
        )
    )
));

// Setup basic error handler for debugging
$app->error(function (\Exception $e, $code) {
    return new Response($e->getMessage());
});

$app->register(new SSENSE\HiringTest\Service\ServiceProvider());

// Return the application
return $app;
