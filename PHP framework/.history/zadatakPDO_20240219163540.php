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
    echo "User ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
            //  foreach ($korisnici as $korisnik) {
        //      echo "User ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
        //  }
    print_r($result);
 }