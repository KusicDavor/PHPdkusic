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
    $korisnik = new Korisnik();
    $korisnik->ime = 'DK';
    $korisnik->spol = 'M';
    $korisnik->dob = 22;
    $result = $korisnik->save();
    listajRezultate($pdo);

    function listajRezultate($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM korisnici");
            $korisnici = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            // listaj rezultate
            foreach ($korisnici as $korisnik) {
                echo "User ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }