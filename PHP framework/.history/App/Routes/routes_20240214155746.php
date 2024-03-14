<?php
namespace Routes;
use Http\Router;
use Classes\Route;

$router = new Router();

$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$route = new Route();

$router->matchRoute();