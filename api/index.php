<?php

// chargement des classes
require_once '../vendor/autoload.php';

// importation des classes
use App\API\Core\Router;
use App\API\Core\Container;

// routage
$router = new Router();
//echo '<pre>';var_dump($router->getRoute());echo '</pre>';

// container
$container = new Container();

// contrôleur
$controller = $container->get(
	$router->getRoute()['route']['controller']
);

// méthode
$method = $router->getRoute()['route']['method'];

// variables d'URL
$uriVars = $router->getRoute()['uriVars'];

// appel de la méthode
$controller->$method($uriVars);

/* dotenv
$dotenv = $container->get('core.dotenv');
echo '<pre>';var_dump($dotenv->get('db_host'));echo '</pre>';
*/

// database
/*$database = $container->get('core.database');
var_dump($database->connect());*/



