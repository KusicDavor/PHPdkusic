<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('/pregled', 'GET', [Router::class, 'obradiRequest']);
$route1 = new Route('/login', 'GET', [Router::class, 'nePostoji']);
$route2 = new Route('/', 'POST', [Router::class, 'obradiRequest']);

$routes[] = $route;
$routes[] = $route1;
$routes[] = $route2;
$router -> addRoutes($routes);