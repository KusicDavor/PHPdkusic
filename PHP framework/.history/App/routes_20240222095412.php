<?php
namespace Routes;
use Classes\Route;
use Http\Router;
use Controllers\IndexController;
use Controllers\UserController;

$router = new Router();
$router->addRoutes([
    new Route('/index', 'GET', [IndexController::class, 'indexAction']),
    new Route('/index/json', 'GET', [IndexController::class, 'indexJsonAction']),
    new Route('/korisnici', 'GET', [UserController::class, 'index']),
    new Route('/korisnici/json', 'GET', [UserController::class, 'returnJsonUsers]),
    new Route('/korisnici', 'POST', [UserController::class, 'saveKorisnika']),
    new Route('/korisnici/create', 'GET', [UserController::class, 'createKorisnika']),
    new Route('/korisnici/{id}', 'GET', [UserController::class, 'prikaziKorisnika']),
    new Route('/korisnici/{id}/delete', 'POST', [UserController::class, 'deleteKorisnika'])
]);