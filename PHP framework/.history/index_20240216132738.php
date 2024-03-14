<?php
require 'vendor/autoload.php';
use Http\Request;

$parameters = [
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22
];

include 'App/Re'

// kontrola slanja GET ili POST metodom
//  false - POST
//  true - GET
// $metoda = true;
// if (!$metoda) {
//     $request = new Request($parameters);
//     $request->send('POST');
// } else {
//     $queryString = http_build_query($parameters);
//     $request = new Request(['query' => $queryString, 'method' => 'GET']);
//     $request->send('GET');
// }