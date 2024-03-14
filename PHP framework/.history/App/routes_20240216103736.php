<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$route = new Route('GET', '/', [Router::class, 'handleRequest']);
$router -> addRoute($route);