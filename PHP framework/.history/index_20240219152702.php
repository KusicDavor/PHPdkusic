<?php
require 'vendor/autoload.php';
use Database\Connection;
use Classes\Korisnik;
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


    $database = Connection::getInstance();
    $database->connect();
    $pdo = $database->getPdo();
    // $korisnik = new Korisnik();
    // $korisnik->ime = 'DK';
    // $korisnik->spol = 'M';
    // $korisnik->dob = 22;
    // $result = $korisnik->save();
    listajRezultate($pdo);

    function listajRezultate($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM korisnici");
            $korisnici = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            // listaj rezultate
            foreach ($users as $user) {
                echo "User ID: " . $user['id'] . ", Username: " . $user['ime'] . ", spol: " . $user['dob'] . "<br>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }