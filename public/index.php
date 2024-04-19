<?php 

require __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();
// on renseigne le nom du dossier dans lequel est notre projet
if(isset($_SERVER['BASE_URI'])){

    $router->setBasePath($_SERVER['BASE_URI']);
    $baseUrl = $_SERVER['BASE_URI'];

} else {

    // $router->setBasePath('/');
    $_SERVER['BASE_URI'] = '/';
    $baseUrl = '/';

}

$router->map(
    'GET', // verbe http de la requete
    '/',  // url de la requete
    [
        'controller' => '\App\Controllers\MainController',
        'method' => 'homeAction',
    ], // informations du code à exécuter
    'main-home' // nom de la route
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

/*** DISPATCH ***/

$match = $router->match();
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
$dispatcher->setControllersArguments($router);
$dispatcher->dispatch();


