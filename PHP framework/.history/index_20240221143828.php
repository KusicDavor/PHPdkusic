<?php
require 'vendor/autoload.php';
use Http\Request;

kontrola slanja GET ili POST metodom
 false - POST
 true - GET
$metoda = true;
$parameters = [];
if (!$metoda) {
    $request = new Request($parameters);
    $request->send('POST');
} else {
    $queryString = http_build_query($parameters);
    $request = new Request(['url' => $_SERVER['REQUEST_URI'], 'query' => $queryString, 'method' => 'GET']);
    $request->send('GET');
}