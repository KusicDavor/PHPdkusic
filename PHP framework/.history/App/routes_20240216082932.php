<?php
use Classes\Route;
use Http\Router;

global $routes;
$routes = [];
$route = new Route('GET', '/login', Router::handle($request));

function getRoutes() {
    global $routes;
    return $routes;
}
$route1 = new Route('POST', '/', Router::handle()($request));