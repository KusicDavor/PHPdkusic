<?php
require 'vendor/autoload.php';
use Database\Database;
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

$database = Database::getInstance();
$pdo = $database->connect();

$statment = $pdo->prepare('SELECT * FROM korisnici WHERE `type`=:type LIMIT 1');
$statment->bindValue('type', 'korisnici');
$statment->execute();

$results = $statment->fetch(PDO::FETCH_ASSOC);
$results = $statment->fetchAll(PDO::FETCH_ASSOC);
