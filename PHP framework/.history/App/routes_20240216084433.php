<?php
use Classes\Route;
use Http\Router;

$router = new Router();
$route = new Route('GET', '/login', Router::handle($request));
$router -> addRoute($route);
function getRoutes() {
    global $routes;
    return $routes;
}