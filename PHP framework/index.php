<?php
require 'vendor/autoload.php';
use Http\Request;

$parameters = [];
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $parameters[$key] = $value;
    }
}

$queryString = http_build_query($parameters);
$request = new Request(['url' => $_SERVER['REQUEST_URI'], 'query' => $queryString, 'method' => 'GET']);
$request->send('GET');