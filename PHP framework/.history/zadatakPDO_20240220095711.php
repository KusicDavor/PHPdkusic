<?php
require 'vendor/autoload.php';
use Database\Connection;
use Classes\Korisnik;
 $connection = Connection::getInstance();
 $connection->connect();
 $pdo = $connection->getPdo();

 $korisnik = new Korisnik();
 $korisnik->attributes = [
    'ime' => 'AA',
    'spol' => 'Ž',
    'dob' => '74'
   //  'id' => '21'
 ];

// save korisnika
// $result = $korisnik->save();

// update korisnika
$result = $korisnik->update();

// find($primaryKey)
// $korisnik = $korisnik::find(13);
// var_dump($korisnik);

// toArray()
// var_dump($korisnik->toArray());

vratiJedanRezultat($connection);
vratiSveRezultate($connection);

 function vratiJedanRezultat($connection) {
    $query = "SELECT * FROM korisnici WHERE id = :value";
    $params = [':value' => 5];
    $korisnik = $connection->fetchAssoc($query, $params);
    echo "JEDAN TRAŽENI RED --------- ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
 }

 function vratiSveRezultate($connection) {
    echo "SVI REDOVI ------------ <br>";
    $query = "SELECT * FROM korisnici";
    $korisnici = $connection->fetchAssocAll($query);
    foreach ($korisnici as $korisnik) {
        echo "ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
    }
 }