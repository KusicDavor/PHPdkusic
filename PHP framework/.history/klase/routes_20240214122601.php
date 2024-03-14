<?php
namespace App;

$r = new Router();
$routes = [];

$r->route('/', function () {
    $request = new Request($_REQUEST);
    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_SERVER['REQUEST_URI'] == "/") {
        include 'views/index.html';
    } else {
        $r1 = new Router();
        $r1->handleRequest($request);
    }
}, 'GET');

foreach ($routes as $path => $callback) {
    $routes[$path] = $callback;
}