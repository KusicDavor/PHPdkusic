<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$router->addRoutes([
    new Route('/', 'GET', [Router::class, 'obradiRequest']),
    new Route('/login', 'GET', [Router::class, 'nePostoji']),
    new Route('/osobe/{ime}', 'GET', [Router::class, 'prikaziOsobu'])
    new Route('/test/{ime}', 'GET', [Router::class, 'obradiRequest'])
]);