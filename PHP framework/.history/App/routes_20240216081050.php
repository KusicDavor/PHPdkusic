<?php
use Classes\Route;

global $routes;
$routes = [];
$route = new Route('GET', '/login', Router::handle());