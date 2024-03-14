<?php
require_once 'Request.php';

$r = new Router();
$routes = [];
//$callback = $r->matchRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

$r->route('/', function () {
    $request = new Request($_REQUEST);
    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_SERVER['REQUEST_URI'] == "/") {
        include 'views/index.html';
    } else {
        $r1 = new Router();
        $r1->handleRequest($request);
    }, 'GET');

$r->route('/login', function () {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        include 'views/login.html';
    }
}, 'GET');

$r->route('/about', function () {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "About Us";
    }
}, 'GET');

foreach ($routes as $path => $callback) {
    $routes[$path] = $callback;
}

require_once 'Router.php';