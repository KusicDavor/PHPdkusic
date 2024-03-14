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
    new Route('/korisnici', 'GET', [KorisnikController::class, 'index']),
    new Route('/korisnici/create', 'GET', [KorisnikController::class, 'create']),
    new Route('/korisnici/{id}', 'GET', [KorisnikController::class, 'prikaziKorisnika']),
    new Route('/korisnici', 'DELETE', [KorisnikController::class, 'deleteKorisnika'])
]);