<?php
namespace Routes;
use Classes\Route;
use Http\Request;
use Http\Router;

$route = new Route('GET', '/', Router::handleRequest());

$router = new Router();
$router -> addRoute($route);