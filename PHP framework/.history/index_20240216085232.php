<?php
require 'vendor/autoload.php';
use Http\Request;
use Http\Router;

$person = [
    'url' => '/',
    'method' => 'POST',
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

global $request;
$request = new Request($person);
$router = new Router();
$router->matchRoute($request);