<?php
require 'vendor/autoload.php';
require 'App/routes.php';
use Http\Request;
use Http\Router;

$parameters = [
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];


$request = new Request($parameters);
$router = new Router($request);
