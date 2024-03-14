<?php
require_once 'Request.php';

$r = new Router();
$routes = [];

$r->route('/', function () {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        include 'views/index.html';
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $request = new Request(['ime' => $_POST['name'], 'spol' => $_POST['spol'], 'dob' => $_POST['dob']]);
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

$r->route($_SERVER['REQUEST_URI'], function () {
    echo "$_SERVER['REQUEST_URI']";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
    }
}, 'GET');

foreach ($routes as $path => $callback) {
    $routes[$path] = $callback;
}

require_once 'Router.php';