<?php
namespace Routes;
use Classes\Route;
use Http\Request;
use Http\Router;

$route = new Route('GET', '/login', Router::handleRequest());
$route = new Route('POST', '/', Router::handleRequest());

$router = new Router();