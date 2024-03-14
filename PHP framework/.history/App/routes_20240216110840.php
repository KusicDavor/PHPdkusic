<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('/', '', [Router::class, 'obradiPOST']);
$routes[] = $route;
$router -> addRoutes($routes);