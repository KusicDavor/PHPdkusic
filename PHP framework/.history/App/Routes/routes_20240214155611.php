<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$routes = [];
$route = new Route("GET", "/login", Router::class::login);


$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$router->matchRoute();