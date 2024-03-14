<?php
use Classes\Route;
use Http\Router;

global $routes;
$routes = [];
$route = new Route('GET', '/login', Router::handle($request));

$route->get('/', function () use ($request) {}