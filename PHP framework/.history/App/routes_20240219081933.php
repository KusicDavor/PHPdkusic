<?php
namespace Routes;
use Classes\Route;
use Http\Router;

$router = new Router();
$router->addRoutes([
    new Route('/', 'GET', [Router::class, 'index']),
    new Route('/login', 'GET', [Router::class, 'nePostoji']),
    new Route('/osobe/{ime}', 'GET', [Router::class, 'prikaziOsobu']),
    new Route('/index', 'GET', [IndexController::class, 'indexAction']),
    new Route('/index/json', 'GET', [IndexController::class, 'indexJsonAction'])
]);