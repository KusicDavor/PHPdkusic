<?php
require 'vendor/autoload.php';
require 'App/Routes/routes.php';

$router->addRoute('GET', '/login', function () {
    $request = new Request($_REQUEST);
    $r = new Router();
    $r->handleRequest($request);
    exit;
});