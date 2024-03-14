<?php
require 'vendor/autoload.php';
use Http\Request;
use Http\Router;
use Classes\Route;

$router = new Router();
$route = new Route('GET', '/login', Router::handle');

$router->addRoute($route);
$router->matchRoute();