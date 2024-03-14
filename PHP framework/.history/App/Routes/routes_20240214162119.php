<?php
namespace Routes;
use Http\Request;
use Http\Router;
use Classes\Route;

$router = new Router();
$route = new Route('GET', '/login', function () {
    $request = new Request($_REQUEST);
    $r = new Router();
    $r->handleRequest($request);
    exit;
});

$router->addRoute('GET', '/login', function () {
    $request = new Request($_REQUEST);
    $r = new Router();
    $r->handleRequest($request);
    exit;
});

$router->matchRoute();