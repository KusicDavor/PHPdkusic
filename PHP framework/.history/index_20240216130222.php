<?php
require 'vendor/autoload.php';
use Http\Request;

// $parameters = [
//     'ime' => 'DK',
//     'spol' => 'M',
//     'dob' => 22
// ];

if (is_null($parameters)) {
    include 
    
}
$request = new Request($parameters);
$request->send('POST');

// $queryString = http_build_query($parameters);
// $request = new Request(['query' => $queryString]);
// $request->send('GET');