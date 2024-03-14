<?php
namespace Routes;
use Http\Router;

$router = new Router();

$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$route = new $

$router->matchRoute();