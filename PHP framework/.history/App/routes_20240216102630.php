<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$route = new Route('POST', '/', [Router::class, 'accept']);
$router -> addRoute($route);