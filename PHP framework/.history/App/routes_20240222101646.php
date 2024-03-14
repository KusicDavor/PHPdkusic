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
    new Route('/korisnici/json', 'GET', [UserController::class, 'returnJsonUsers']),
    new Route('/korisnici', 'POST', [UserController::class, 'saveUser']),
    new Route('/korisnici/create', 'GET', [UserController::class, 'createUser']),
    new Route('/korisnici/{id}', 'GET', [UserController::class, 'showUserDetail']),
    new Route('/korisnici/{id}/delete', 'POST', [UserController::class, 'deleteUser']),
    new Route('/korisnici/{id}/edit', 'PUT', [UserController::class, 'updateUser'])
    new Route('/korisnici/{id}', 'PUT', [UserController::class, 'updateUser'])
]);