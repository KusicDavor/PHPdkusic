<?php
require_once 'Router.php';
require_once 'Request.php';

$callback = $router->matchRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
if ($callback) {
    echo "tu sam";
    //$callback();
}

$router->route('/', function () {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        include 'views/index.html';
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $request = new Request(['ime' => $_POST['name'], 'spol' => $_POST['spol'], 'dob' => $_POST['dob']]);
        $router->handleRequest($request);
    }
}, 'GET');

$r->route('/dodaj', function () {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $request = new Request($_GET);
        $request->getQueryParams();
        $r1 = new Router();
        $r1->handleRequest($request);
    }
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

$routes = [];
foreach ($routes as $path => $callback) {
    $routes[$path] = $callback;
}