<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$routes = [];
$route = new Route('GET', '/', [Router::class, 'handleRequest']);
