<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('/pregled', 'POST', [Router::class, 'obradiPOST']);
$route = new Route('/pregled', 'POST', [Router::class, 'obradiGET']);
$route1 = new Route('/login', 'GET', [Router::class, 'nePostoji']);

$routes[] = $route;
$routes[] = $route1;
$router -> addRoutes($routes);