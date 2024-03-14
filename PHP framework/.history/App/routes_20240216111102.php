<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('/', 'GET', [Router::class, 'obradiPOST']);

$routes[] = $route;
$router -> addRoutes($routes);