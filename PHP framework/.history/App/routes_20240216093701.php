<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];

$route = new Route('GET', '/login', Router::handleRequest());
$route1 = new Route('POST', '/', Router::handleRequest());
$router -> addRoute($route1);

