<?php
require 'vendor/autoload.php';
require 'App/Routes/routes.php';

$router = new Router();
$route = new Route('GET', '/login', function () {
    $request = new Request($_REQUEST);
    $r = new Router();
    $r->handleRequest($request);
    exit;
});

$router->addRoute($route);
$router->matchRoute();