<?php
use Http\Router;
include_once "Roroutes.php";
$router = new Router();

$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$router->matchRoute();