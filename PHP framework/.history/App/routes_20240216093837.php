<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$route = new Route('GET', '/', Router::handleRequest());
$router -> addRoute($route);

