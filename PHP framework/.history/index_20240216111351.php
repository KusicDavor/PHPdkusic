<?php
require 'vendor/autoload.php';
require 'App/routes.php';
use Http\Request;

$parameters = [
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

$request = new Request($parameters);
$request->send('');