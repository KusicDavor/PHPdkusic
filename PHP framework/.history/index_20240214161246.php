<?php
require 'vendor/autoload.php';
require 'App/Routes/routes.php';
use Http\Router;
$router = new Router();
$route = new Route('GET', '/blogs', function() {
    echo "ovo radi";
});
$router->matchRoute();