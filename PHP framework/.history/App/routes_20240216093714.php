<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$route = new Route('GET', '/login', Router::handleRequest());
$router -> addRoute($route);
$route1 = new Route('POST', '/', Router::handleRequest());
$router -> addRoute($route1);

