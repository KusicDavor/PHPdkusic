<?php
require 'vendor/autoload.php';
require 'App/routes.php.php';
use Http\Request;
use Http\Router;

$parameters = [
    'url' => '/',
    'method' => 'POST',
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

$request = new Request($parameters);
$router = new Router();
$router->handleRequest($request);
