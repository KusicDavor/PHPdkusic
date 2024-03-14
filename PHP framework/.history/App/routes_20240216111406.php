<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('/', 'GET', [Router::class, 'obradiPOST']);
$route = new Route('/login', 'GET', [Router::class, 'nePostoji']);

$routes[] = $route;
$router -> addRoutes($routes);