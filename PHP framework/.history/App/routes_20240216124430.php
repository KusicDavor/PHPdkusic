<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('/pregled', 'GET', [Router::class, 'obradiRequest']);
$route1 = new Route('/login', 'GET', [Router::class, 'nePostoji']);
$route3 = new Route('/', 'GET', [Router::class, 'index']);

// $route2 = new Route('/', 'GET', function() {
//     $router = new Router();
//     $router->posalji('zahtjev poslan');
// });

$routes[] = $route;
$routes[] = $route1;
$routes[] = $route2;
$route3 = new Route('/', 'GET', [Router::class, 'index']);
$router -> addRoutes($routes);