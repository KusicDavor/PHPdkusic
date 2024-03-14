<?php
use Classes\Route;
use Http\Route;

global $routes;
$routes = [];
$route = new Route('GET', '/login', Router::handle());