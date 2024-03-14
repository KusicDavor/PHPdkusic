<?php
require 'vendor/autoload.php';
require 'App/Routes/routes.php';
use Http\Request;
use Http\Router;

$router->addRoute('GET', '/login', function () {
    $request = new Request($_REQUEST);
    $r = new Router();
    $r->handleRequest($request);
    exit;
});