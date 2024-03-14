<?php
require 'vendor/autoload.php';
require '\App/routes.php';
use Http\Request;
use Http\Router;

$person = [
    'url' => '/',
    'method' => 'POST',
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

$request = new Request($person);
$router = new Router();
$router->handleRequest($request);