<?php
namespace Routes;
use Classes\Route;
use Http\Router;
use Controllers\IndexController;
use Controllers\KorisnikController;

$router = new Router();
$router->addRoutes([
    new Route('/index', 'GET', [IndexController::class, 'indexAction']),
    new Route('/index/json', 'GET', [IndexController::class, 'indexJsonAction']),
    new Route('/', 'GET', [KorisnikController::class, 'index']),
    new Route('/{id}', 'GET', [KorisnikController::class, 'prikaziOsobu']),
    new Route('/create', 'GET', [KorisnikController::class, 'create'])
]);