<?php
require 'vendor/autoload.php';
req
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