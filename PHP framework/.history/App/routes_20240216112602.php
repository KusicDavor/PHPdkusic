<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('/', 'GET', [Router::class, 'obradiPOST']);
$route1 = new Route('/login', 'GET', [Router::class, 'nePostoji']);

$routes[] = $route;
$routes[] = $route1;
$router -> addRoutes($routes);