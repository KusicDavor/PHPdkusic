<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$route = new Route('GET', '/', [Router::class, 'acc']);
$router -> addRoute($route);