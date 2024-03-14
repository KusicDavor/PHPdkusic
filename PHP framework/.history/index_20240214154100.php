<?php
use Http\Router;
include_once "<App>Routes routes.php";
$router = new Router();

$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$router->matchRoute();