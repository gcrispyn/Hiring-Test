<?php
namespace SSENSE\HiringTest\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;
use ReflectionClass;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * 
     */
    public function register(Application $app)
    {
        foreach ($app['services'] as $serviceName => $className) {
            if (! is_array($className)) {
                $app[$serviceName] = new $className($app);
            } else {
                $r = new ReflectionClass($className['class']);
                $app[$serviceName] = $r->newInstanceArgs($className['arguments']);; 
            }
        }
    }
    
    public function boot(Application $app){}
}