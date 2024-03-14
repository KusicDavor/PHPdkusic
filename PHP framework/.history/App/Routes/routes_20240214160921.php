<?php
namespace Routes;
use Http\Request;
use Http\Router;
use Classes\Route;

$route = new Route('GET', '/blogs', function() {
    echo "ovo radi";
});

$router = new Router();
$router->addRoute($route);

$router->matchRoute();