<?php
use Classes\Route;
use Http\;

global $routes;
$routes = [];
$route = new Route('GET', '/login', Router::handle());