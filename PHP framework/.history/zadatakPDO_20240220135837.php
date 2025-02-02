<?php
require 'vendor/autoload.php';
use Database\Connection;
use Classes\Korisnik;
 $connection = Connection::getInstance();
 $connection->connect();
 $pdo = $connection->getPdo();

 // kreiranje korisnika
 // parametri: ime, spol (M ili Ž), dob
 // opcionalni parametar: id (služi kod update metode)
 $korisnik = new Korisnik("Projekt", "Ž", 19, 16);

// save korisnika
// $result = $korisnik->save();

// update korisnika
// $result = $korisnik->update();

// find($primaryKey)
// $korisnik = $korisnik::find(29);
// var_dump($korisnik);

// toArray()
// var_dump($korisnik->toArray());

// delete korisnika
 $korisnik->delete($this);

//vratiJedanRezultat($connection);
vratiSveRezultate($connection);

 function vratiJedanRezultat($connection) {
    $query = "SELECT * FROM korisnici WHERE id = :value";
    $params = [':value' => 7];
    $korisnik = $connection->fetchAssoc($query, $params);
    echo "JEDAN TRAŽENI RED --------- ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
 }

 function vratiSveRezultate($connection) {
    echo "<br>SVI REDOVI ------------ <br>";
    $query = "SELECT * FROM korisnici";
    $korisnici = $connection->fetchAssocAll($query);
    foreach ($korisnici as $korisnik) {
        echo "ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
    }
 }