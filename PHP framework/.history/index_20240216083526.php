<?php
require 'vendor/autoload.php';
use Http\Request;

$person = [
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

$req = [];

$request = new Request('POST', );
$request->send();

$router->matchRoute();