<?php
require 'vendor/autoload.php';
use Http\Request;


// if (is_null($parameters)) {
//     include 'Resources/views/index.html';
// } else {
    $parameters = [
        'ime' => 'DK',
        'spol' => 'M',
        'dob' => 22
    ];
    $request = new Request($parameters);
    $request->send('POST');
}


// $queryString = http_build_query($parameters);
// $request = new Request(['query' => $queryString]);
// $request->send('GET');