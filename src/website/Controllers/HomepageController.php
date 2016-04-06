<?php
namespace SSENSE\HiringTest\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use SSENSE\HiringTest\Models\Country;

class HomepageController 
{
    /**
     * Display the homepage
     * 
     * @param Application $app
     * @param Request $request 
     */
    public function displayAction(Application $app, Request $request)
    {
        // Render the page
        return $app['twig']->render('homepage/display.html', []);
    }
    
        /**
     * Display the homepage
     * 
     * @param Application $app
     * @param Request $request 
     */
    public function canadianProductsAction(Application $app)
    {
        $products = $app['cache']->fetch('products');
        
        if ($products === false) {
            $products = $app['products']->getProductsByCountryCode(Country::CANADA_CODE);

            $app['cache']->store('products', $products);
        }

        // Render the page
        return $app['twig']->render('homepage/canadianProducts.html', [
            'products' => $products
        ]);
    }
}
