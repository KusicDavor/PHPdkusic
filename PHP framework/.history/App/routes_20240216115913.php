<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$tekst = "tekst";

$route = new Route('/pregled', 'GET', [Router::class, 'obradiRequest']);
$route1 = new Route('/login', 'GET', [Router::class, 'nePostoji']);
$route = new Route('/pregled', 'GET', [Router::class, 'obradiRequest']);

$routes[] = $route;
$routes[] = $route1;
$router -> addRoutes($routes);