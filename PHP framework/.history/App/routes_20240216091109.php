<?php
use Classes\Route;
use Http\Router;

$router = new Router();




$route = new Route('GET', '/login', Router::handleRequest($request));
$router -> addRoute($route);