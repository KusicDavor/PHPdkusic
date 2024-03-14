<?php
namespace Routes;
use Classes\Route;
use Http\Request;
use Http\Router;

$router = new Router();
$route = new Route('GET', '/login', Router::handleRequest());


$router -> addRoute($route);