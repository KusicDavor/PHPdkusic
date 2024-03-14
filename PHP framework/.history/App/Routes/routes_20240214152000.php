<?php
namespace Routes;
use Http\Router;
use Classes\Route;

$r = new Router();
$routes = [];

return function (Route $routes): void {
    $routes->add('dodaj', '/dodaj')
        ->controller([Router::class, 'dodaj'])
        ;
};