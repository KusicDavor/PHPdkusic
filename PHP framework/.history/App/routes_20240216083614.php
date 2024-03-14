<?php
use Classes\Route;
use Http\Router;

global $routes;
$routes = [];
$route = new Route('GET', '/login', Router::handle($request));
$route1 = new Route('POST', '/', Router::handle($request));