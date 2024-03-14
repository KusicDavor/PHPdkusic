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
 listajRezultate($pdo);

 function jedanRed($pdo) {
        $connection = Connection::getInstance();
        $query = "SELECT * FROM korisnici WHERE id = :value";
        $params = [':value' => 10];
        $result = $connection->fetchAssoc($query, $params);
        print_r($result);
 }