<?php
require 'vendor/autoload.php';
use Database\Connection;
use Classes\Korisnik;

$connection = Connection::getInstance();
$connection->connect();
$pdo = $connection->getPdo();

// kreiranje korisnika
// parametri: ime, spol (M ili Ž), dob
// opcionalni parametar: id (služi kod update metode)ž
// $korisnik = new Korisnik("Pete", "M", 29);

// save korisnika
// $result = $korisnik->save();

// update korisnika
// $id = 35;
// $korisnik = Korisnik::find($id);
// $korisnik->attributes = ['id' => $id];
// $korisnik->setIme("Pete");
// $korisnik->setSpol("M");
// $korisnik->setDob(46);
// $result = $korisnik->update();


// find($primaryKey)
// $korisnik = Korisnik::find(50);
// print_r($korisnik);

// toArray()
// print_r($korisnik->toArray());

// delete korisnika
// $id = 35;
// $korisnik = new Korisnik();
// $korisnik->attributes = ['id' => $id];
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