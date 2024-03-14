<?php
require 'vendor/autoload.php';
use Http\Request;

$parameters = [];
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $parameters[$key] = $value;
    }
}


// kontrola slanja GET ili POST metodom
//  false - POST
//  true - GET
$metoda = true;
if (!$metoda) {
    $request = new Request($parameters);
    $request->send('POST');
} else {
    $queryString = http_build_query($parameters);
    $request = new Request(['url' => $_SERVER['REQUEST_URI'], 'query' => $queryString, 'method' => 'GET']);
    $request->send('GET');
}