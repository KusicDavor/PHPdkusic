<?php
namespace Routes;
use Classes\Route;
use Http\Request;
use Http\Router;

$request = new Request($parameters);
$route = new Route('GET', '/login', Router::handleRequest($request));

$router = new Router();
$router -> addRoute($route);