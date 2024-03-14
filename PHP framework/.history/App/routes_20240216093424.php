<?php
namespace Routes;
use Classes\Route;
use Http\Request;
use Http\Router;

$routes = [];
$route = new Route('GET', '/login', Router::handleRequest());
$route1 = new Route('POST', '/', Router::handleRequest());

foreach
$router -> addRoute($route);

$router = new Router();