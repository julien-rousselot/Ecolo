<?php 

require __DIR__ . '/../vendor/autoload.php';

// dd($_SERVER); "/Ecolo'o/public"
$router = new AltoRouter();

if (array_key_exists('BASE_URI', $_SERVER)) {
    $router->setBasePath($_SERVER['BASE_URI']);
} else {
    $_SERVER['BASE_URI'] = '/';
}

$router->map(
    'GET',
    '/',
    [
        'controller' => '\App\Controllers\MainController',
        'method' => 'homeAction',
    ],
    'main-home'
);

// 'GET', // verbe http de la requete
// '/',  // url de la requete
// 'MainController::homeAction',
// 'homeAction',
// 'main-home' // nom de la route

$router->map(
    'GET', 
    '/catalogue/vehicules', 
    [
        'controller' => '\App\Controllers\CatalogController',
        'method' => 'categorieVehiculeAction',
    ], 
    'catalogue-vehicules'
);

$router->map(
    'GET', 
    '/catalogue/vehiculespricefilter', 
    [
        'controller' => '\App\Controllers\CatalogController',
        'method' => 'filtercategorieVehiculeAction',
    ], 
    'vehicules-price-filter'
);

$router->map(
    'GET', 
    '/catalogue/vehicules/[a:brand]', 
    [
        'controller' => '\App\Controllers\CatalogController',
        'method' => 'filterBrandAction',
    ], 
    'vehicules-marque-filter'
);

$router->map(
    'GET', 
    '/connexion', 
    [
        'controller' => '\App\Controllers\UserController',
        'method' => 'connexionAction',
    ], 
    'connexion'
);

$router->map(
    'POST', 
    '/connexion', 
    [
        'controller' => '\App\Controllers\UserController',
        'method' => 'connexionActionPost',
    ], 
    'connexion-post'
);

$router->map(
    'GET', 
    '/inscription', 
    [
        'controller' => '\App\Controllers\UserController',
        'method' => 'inscriptionAction',
    ], 
    'inscription'
);

$router->map(
    'POST', 
    '/inscription', 
    [
        'controller' => '\App\Controllers\UserController',
        'method' => 'inscriptionActionPost',
    ], 
    'inscription-post'
);

// $match = $router->match();
// $dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// $dispatcher->setControllersArguments($router);
// $dispatcher->dispatch();


$match = $router->match();

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
$dispatcher->dispatch();