<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$router->addRoutes([
    new Route('/', 'POST', [Router::class, 'obradiRequest']),
    new Route('/login', 'GET', [Router::class, 'nePostoji']),
]);