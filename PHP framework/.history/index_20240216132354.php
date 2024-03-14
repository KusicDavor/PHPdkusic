<?php
require 'vendor/autoload.php';
use Http\Request;

$parameters = [
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

$metoda = false;
if (!$metoda) {
    
}
// za slanje POST metodom
$request = new Request($parameters);
$request->send('POST');

//za slanje GET metodom
$queryString = http_build_query($parameters);
$request = new Request(['query' => $queryString, 'method' => 'GET']);
$request->send('GET');