<?php
require 'vendor/autoload.php';
use Http\Router;

$routes = [];
$routes[] = $route;

$router = new Router($routes);
$router->matchRoute();