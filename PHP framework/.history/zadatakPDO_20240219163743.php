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
 vratiJedanRezultat($connection);
 vratiSveRezultate($connection);

 function vratiJedanRezultat($connection) {
    $query = "SELECT * FROM korisnici WHERE id = :value";
    $params = [':value' => 10];
    $korinsik = $connection->fetchAssoc($query, $params);
    echo "User ID: " . $result['id'] . ", Ime: " . $result['ime'] . ", Spol: " . $result['spol'] . ", Dob: " . $result['dob'] . "<br>";
 }

 function vratiSveRezultate($connection) {
    $query = "SELECT * FROM korisnici";
    $korisnici = $connection->fetchAssocAll($query);
    foreach ($result as $korisnik) {
        echo "User ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
    }
 }