<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$route = new Route('GET', '/', [Router::class, 'handle']);
$router -> addRoute($route);