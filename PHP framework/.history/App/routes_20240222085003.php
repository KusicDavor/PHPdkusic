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
    new Route('/korisnici', 'GET', [KorisnikController::class, 'saveKorisnik']),
    new Route('/korisnici/create', 'GET', [KorisnikController::class, 'createKorisnika']),
    new Route('/korisnici/{id}', 'GET', [KorisnikController::class, 'prikaziKorisnika']),
    new Route('/korisnici/{id}/delete', 'POST', [KorisnikController::class, 'deleteKorisnika'])
]);