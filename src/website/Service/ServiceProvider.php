<?php
namespace SSENSE\HiringTest\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * 
     */
    public function register(Application $app)
    {
        foreach ($app['services'] as $serviceName => $className) {
            $app[$serviceName] = new $className($app);
        }
    }
    
    public function boot(Application $app){}
}