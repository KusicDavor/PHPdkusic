<?php
namespace Routes;
use Http\Router;
use Http\Request;
use Classes\Route;

$r = new Router();
$routes = [];



$r->route('/', function () {
    $request = new Request($_REQUEST);
    if ($_SERVER["REQUEST_METHOD"] == "GET" && $_SERVER['REQUEST_URI'] == "/") {
        include 'Resources/views/index.html';
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $r1 = new Router();
        $r1->handleRequest($request);
    }
});

$r->route('/login', function () {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "Login:";
    }
});