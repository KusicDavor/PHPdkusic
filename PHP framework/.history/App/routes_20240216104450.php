<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('GET', '/', [Router::class, 'handleRequest']);
$route = 
$router -> addRoutes($routes);