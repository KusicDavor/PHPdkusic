<?php
require 'vendor/autoload.php';
// use Http\Request;

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

define('DB_NAME', 'prvi_zadatak');
define('DB_USER', 'prvi_zadatak');
define('DB_PASS', '');

try {

    $connection = new PDO('mysql:host=mysql;dbname='.DB_NAME, DB_USER, DB_PASS);
} catch (\Throwable $t) {
    throw $t;
}

$statment = $connection->prepare('SELECT * FROM users WHERE `type`=:type LIMIT 1');

// Parametri se također umjesto sa `bindValue` mogu prosljediti i u `execute`
$statment->bindValue('type', 'users');
$statment->execute();

$results = $statment->fetch(PDO::FETCH_ASSOC);
$results = $statment->fetchAll(PDO::FETCH_ASSOC);
