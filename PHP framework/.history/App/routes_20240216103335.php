<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$route = new Route('GET', '/', [Router::class, 'handleRequest']);
$router -> addRoute($route);