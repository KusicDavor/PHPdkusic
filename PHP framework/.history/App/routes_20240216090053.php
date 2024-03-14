<?php
use Classes\Route;
use Http\Router;

$router = new Router();
$route = new Route('GET', '/login', Router::handleRe($request));
$router -> addRoute($route);