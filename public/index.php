<?php 

require __DIR__ . '/../vendor/autoload.php';
// dd($_SERVER); "/Ecolo'o/public"
$router = new AltoRouter();
// on renseigne le nom du dossier dans lequel est notre projet
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
} else { // sinon
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '/';
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
/*** DISPATCH ***/

// $match = $router->match();
// $dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// $dispatcher->setControllersArguments($router);
// $dispatcher->dispatch();


$match = $router->match();

// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();