<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$router->addRoutes([
    new Route('/', 'GET', [Router::class, 'obradiRequest']),
    new Route('/login', 'GET', [Router::class, 'nePostoji']),
    new Route('/{ime}', 'GET', function() {
        $router = new Router();
        $router->prikaziOsobu($ime);
    })
]);