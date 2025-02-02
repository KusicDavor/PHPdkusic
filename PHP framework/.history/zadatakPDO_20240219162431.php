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

 function listajRezultate($pdo) {
     try {
        $connection = Connection::getInstance();
        $query = "SELECT * FROM korisnici WHERE 'id' = :value";
        $params = [':value' => 5];
        $result = $connection->fetchAssocAll($query, $params);
        var_dump($result);

        //  $stmt = $pdo->query("SELECT * FROM korisnici");
        //  $stmt->execute();
        //  $korisnici = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
         // listaj rezultate
        //  foreach ($korisnici as $korisnik) {
        //      echo "User ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
        //  }
     } catch (PDOException $e) {
         echo "Error: " . $e->getMessage();
     }
 }