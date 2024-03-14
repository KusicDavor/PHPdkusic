<?php
namespace Routes;
use Classes\Route;
use Http\Request;
use Http\Router;

$route = new Route('GET', '/login', Router::handleRequest());
$router -> addRoute($route);
$route = new Route('POST', '/', Router::handleRequest());
$router -> addRoute($route);

$router = new Router();