<?php
namespace Routes;
use Classes\Route;
use Http\Router;
use Controllers\IndexController;
use Controllers\KorisnikController;

$router = new Router();
$router->addRoutes([
    new Route('/', 'GET', [Router::class, 'default']),
    new Route('/osobe/{ime}', 'GET', [Router::class, 'prikaziOsobu']),
    new Route('/index', 'GET', [IndexController::class, 'indexAction']),
    new Route('/index/json', 'GET', [IndexController::class, 'indexJsonAction']),
    new Route('/korisnik', 'GET', [KorisnikController::class, 'index']),
    new Route('/korisnik', 'GET', [KorisnikController::class, 'create'])
]);