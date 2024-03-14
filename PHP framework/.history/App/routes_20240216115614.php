<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$tekst = "tekst";

$route = new Route('/', 'GET', [Router::class, 'tekst($tekst)']);
$route1 = new Route('/pregled', 'GET', [Router::class, 'obradiRequest']);
$route2 = new Route('/login', 'GET', [Router::class, 'nePostoji']);

$routes[] = $route;
$routes[] = $route1;
$router -> addRoutes($routes);