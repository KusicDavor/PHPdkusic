<?php
use Classes\Route;
use Http\Request;
use Http\Router;

$router = new Router();

$parameters = [
    'url' => '/',
    'method' => 'POST',
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

$request = new Request($parameters);


$route = new Route('GET', '/login', Router::handleRequest($request));
$router -> addRoute($route);