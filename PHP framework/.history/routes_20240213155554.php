<?php
require_once 'Router.php';
require_once 'Request.php';

$r = new Router();

// Add routes to the $routes array
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

// Add more routes as needed...
$routes = [];
// Loop through the routes and add them to the $routes array
foreach ($routes as $path => $callback) {
    $routes[$path] = $callback;
    
}