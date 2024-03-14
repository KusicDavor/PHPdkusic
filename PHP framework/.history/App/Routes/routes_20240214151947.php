<?php
namespace Routes;
use Http\Router;
use Classes\Route;

$r = new Router();
$routes = [];

return function (Route $routes): void {
    $routes->add('blog_list', '/blog')
        ->controller([Router::class, 'list'])
        ;
};