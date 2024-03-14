<?php
require 'vendor/autoload.php';
use Http\Router;
use Classes\Route;

$route = new Route('GET', '/login', Router::handleRequest);

$routes = [];
$routes[] = $route;

$router = new Router($routes);
$router->matchRoute();