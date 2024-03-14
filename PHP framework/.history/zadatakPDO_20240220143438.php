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
$korisnik = new Korisnik("Ren", "M", 31);

// save korisnika
//$result = $korisnik->save();

// update korisnika
$id = 22;
//$korisnik->attributes['id'] = $id;
//$result = $korisnik->update();

// find($primaryKey)
// $korisnik = new Korisnik();
// $korisnik = $korisnik::find(16);
// var_dump($korisnik);

// toArray()
// var_dump($korisnik->toArray());

// delete korisnika
// $korisnik->delete();

//vratiJedanRezultat($connection);
//vratiSveRezultate($connection);

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