<?php
require 'vendor/autoload.php';
use Database\Connection;
use Classes\Korisnik;
 $connection = Connection::getInstance();
 $connection->connect();
 $pdo = $connection->getPdo();

 $korisnik = new Korisnik();
 $korisnik->attributes = [
     'ime' => 'DK',
     'spol' => 'M',
     'dob' => '22'
 ];

 // dodavanje korisnika
 // $result = $korisnik->save();
 vratiJedanRezultat($pdo);

 function vratiJedanRezultat($pdo) {
    $connection = Connection::getInstance();
    $query = "SELECT * FROM korisnici WHERE id = :value";
    $params = [':value' => 10];
    $result = $connection->fetchAssoc($query, $params);
    echo "User ID: " . $result['id'] . ", Ime: " . $result['ime'] . ", Spol: " . $result['spol'] . ", Dob: " . $result['dob'] . "<br>";
 }

 function vratiJedanRezultat($pdo) {
    $connection = Connection::getInstance();
    $query = "SELECT * FROM korisnici WHERE id = :value";
    $params = [':value' => 10];
    $result = $connection->fetchAssoc($query, $params);
    echo "User ID: " . $result['id'] . ", Ime: " . $result['ime'] . ", Spol: " . $result['spol'] . ", Dob: " . $result['dob'] . "<br>";
 }