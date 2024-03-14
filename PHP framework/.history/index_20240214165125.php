<?php
require 'vendor/autoload.php';
use Http\Router;
use Classes\Route;

$router = new Router();
$route = new Route('GET', '/login', Router::handle());

$routes = [];
$routes=$route;

$router->matchRoute();