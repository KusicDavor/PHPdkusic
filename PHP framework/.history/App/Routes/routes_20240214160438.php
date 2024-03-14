<?php
namespace Routes;
use Http\Request;
use Http\Router;
use Classes\Route;

$router = new Router();

$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$router->addRoute('GET', '/', function () {
    $request = new Request($_REQUEST);
    $router->handleRequest($request);
    exit;
});


$router->matchRoute();