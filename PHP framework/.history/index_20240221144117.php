<?php
require 'vendor/autoload.php';
use Http\Request;

$parameters = [
    'ime' => 'DK',
    'spol' => 'M',
    'dob' => 22,
];

if (!empty($_GET)) {
    // Iterate over each GET parameter
    foreach ($_GET as $key => $value) {
        $parameters[$key] = $value;
    }
}
$parameters = [];
if (!$metoda) {
    $request = new Request($parameters);
    $request->send('POST');
} else {
    $queryString = http_build_query($parameters);
    $request = new Request(['url' => $_SERVER['REQUEST_URI'], 'query' => $queryString, 'method' => 'GET']);
    $request->send('GET');
}