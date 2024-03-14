<?php
require 'vendor/autoload.php';
use Controllers\IndexController;
use Controllers\UserController;
use Database\Connection;
use Classes\User;


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