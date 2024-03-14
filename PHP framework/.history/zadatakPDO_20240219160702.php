<?php
use Database\Connection;
use Classes\Korisnik;
 $database = Conne::getInstance();
 $database->connect();
 $pdo = $database->getPdo();

 $korisnik = new Korisnik();
 $korisnik->attributes = [
     'ime' => 'DK',
     'spol' => 'M',
     'dob' => '22'
 ];

 $result = $korisnik->save();
 listajRezultate($pdo);

 function listajRezultate($pdo) {
     try {
         $stmt = $pdo->query("SELECT * FROM korisnici");
         $korisnici = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
         // listaj rezultate
         foreach ($korisnici as $korisnik) {
             echo "User ID: " . $korisnik['id'] . ", Ime: " . $korisnik['ime'] . ", Spol: " . $korisnik['spol'] . ", Dob: " . $korisnik['dob'] . "<br>";
         }
     } catch (PDOException $e) {
         echo "Error: " . $e->getMessage();
     }
 }