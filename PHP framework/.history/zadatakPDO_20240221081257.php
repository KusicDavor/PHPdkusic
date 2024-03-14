<?php
require 'vendor/autoload.php';
use Database\Connection;
use Classes\Korisnik;
use Database\Model;

$connection = Connection::getInstance();
$connection->connect();
$pdo = $connection->getPdo();

// kreiranje korisnika
// parametri: ime, spol (M ili Ž), dob
// opcionalni parametar: id (služi kod update metode)ž
$korisnik = new Korisnik("Marr", "M", 50);

// save korisnika
// $result = $korisnik->save();

// update korisnika
// $korisnik = new Korisnik("Marr", "M", 52, 16);
// $result = $korisnik->update();

// find($primaryKey)
// $korisnik = new Korisnik();
$korisnik = array_values(Korisnik::find(16));
$ime = array_sh
var_dump($korisnik);

// toArray()
// var_dump($korisnik->toArray());

// delete korisnika
// $korisnik->attributes['id'] = 12;
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