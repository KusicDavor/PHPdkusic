<?php
namespace App;

$r = new Router();
$routes = [];
$request = new Request($_REQUEST);

$r->route('/', function () {
    $request = new Request($_REQUEST);
    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_SERVER['REQUEST_URI'] == "/") {
        include 'views/index.html';
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $r1 = new Router();
        $r1->handleRequest($request);
    }
});

$r->route('/dodaj', function () {
    $request = new Request($_REQUEST);
    echo "Login:";
  });

foreach ($routes as $path => $callback) {
    $routes[$path] = $callback;
}