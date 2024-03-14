<?php
require 'vendor/autoload.php';
use Http\Router;
use Classes\Route;

$routes = [];
$routes[] = $route;

$router = new Router($routes);
$router->matchRoute();