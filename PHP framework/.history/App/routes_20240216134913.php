<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$router->addRoutes([
    new Route('/', 'GET', [Router::class, 'obradiRequest']),
    new Route('/login', 'GET', [Router::class, 'nePostoji']),
    new Route('/', 'GET', function() {
        $router = new Router();
        $router->posalji('your_text_here');
    });
    new Route('/{ime}', 'GET', [Router::class, 'prikaziOsobu']),
]);