<?php
namespace Routes;
use Http\Router;
use Classes\Route;

$router = new Router();

$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$router->addRoute('GET', '/', function () {
    Router
    exit;
});

$router->matchRoute();