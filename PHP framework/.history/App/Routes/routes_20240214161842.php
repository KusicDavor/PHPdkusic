<?php
namespace Routes;
use Http\Request;
use Http\Router;
use Classes\Route;

$router = new Router();

$router->addRoute('GET', '/login', function () {
    $request = new Request($_REQUEST);
    $r = new Router();
    $router->matchRoute();
    exit;
});