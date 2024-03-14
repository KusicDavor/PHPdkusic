<?php
namespace Routes;
use Classes\Route;
use Http\Router;
use Controllers\IndexController;
use Controllers\KorisnikController;

$router = new Router();
$router->addRoutes([
    new Route('/kori', 'GET', [IndexController::class, 'indexAction']),
    new Route('/index/json', 'GET', [IndexController::class, 'indexJsonAction']),
    new Route('/', 'GET', [KorisnikController::class, 'index']),
    new Route('/korisnici/{id}', 'GET', [KorisnikController::class, 'prikaziOsobu']),
    new Route('/korisnici/create', 'GET', [KorisnikController::class, 'create'])
]);