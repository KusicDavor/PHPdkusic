<?php
require 'vendor/autoload.php';
use Controllers\IndexController;
use Controllers\KorisnikController;
use Database\Connection;
use Classes\Korisnik;


$connection = Connection::getInstance();
$connection->connect();


// update korisnika
// try {
//    $id = 50;
//    $korisnik = Korisnik::find($id);
//    $korisnik->attributes = ['id' => $id];
//    $korisnik->setIme("Pete");
//    $korisnik->setSpol("M");
//    $korisnik->setDob(45);
//    $result = $korisnik->update();
//    print_r($korisnik);
// } catch (Exception $e) {
//    echo $e->getMessage();
// }


// try {
//    $id = 35;
//    $korisnik = Korisnik::find($id);
//    print_r($korisnik);
// } catch (Exception $e) {
//    echo $e->getMessage();
// }


// toArray()
// print_r($korisnik->toArray());