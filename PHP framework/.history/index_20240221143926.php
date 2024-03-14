<?php
require 'vendor/autoload.php';
use Http\Request;

$parameters = [];
if (!$metoda) {
    $request = new Request($parameters);
    $request->send('POST');
} else {
    $queryString = http_build_query($parameters);
    $request = new Request(['url' => $_SERVER['REQUEST_URI'], 'query' => $queryString, 'method' => 'GET']);
    var_dump($queryString);
    var_dump($queryString);
    $request->send('GET');
}