<?php
require 'vendor/autoload.php';
use Http\Request;

$person = [
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

global $request;
$request = new Request($person);