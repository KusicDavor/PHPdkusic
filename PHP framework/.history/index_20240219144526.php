<?php
require 'vendor/autoload.php';
use Databases\Database;
use Http\Request;

// $parameters = [
//     'ime' => 'DK',
//     'spol' => 'M',
//     'dob' => 22,
// ];

// // kontrola slanja GET ili POST metodom
// //  false - POST
// //  true - GET
// $metoda = true;
// if (!$metoda) {
//     $request = new Request($parameters);
//     $request->send('POST');
// } else {
//     $queryString = http_build_query($parameters);
//     $request = new Request(['url' => $_SERVER['REQUEST_URI'], 'query' => $queryString, 'method' => 'GET']);
//     $request->send('GET');
// }


$host = 'localhost';
$dbname = 'prvi_zadatak';
$username = 'prvi_zadatak';
$password = 'zadatak';


try {
    $pdo = Database::getInstance()->connect('localhost', 'prvi_zadatak', 'prvi_zadatak', 'zadatak');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
}