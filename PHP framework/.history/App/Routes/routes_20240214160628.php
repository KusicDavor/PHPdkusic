<?php
namespace Routes;
use Http\Request;
use Http\Router;
use Classes\Route;

$route = new Route('GET', '/blogs');

$router = new Router();

$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$router->addRoute('GET', '/', function () {
    $request = new Request($_REQUEST);
    $this->handleRequest($request);
    exit;
});

$router->matchRoute();