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
$request->send('POST');
echo "ovo";

// $queryString = http_build_query($parameters);
// $request = new Request(['url' => $url]);
// $request->send('GET');