<?php
require 'vendor/autoload.php';
use Databases\Database;


$database = Database::getInstance();
$pdo = $database->connect();

$statment = $pdo->prepare('SELECT * FROM korisnici WHERE `type`=:type LIMIT 1');
$statment->bindValue('type', 'korisnici');
$statment->execute();

$results = $statment->fetch(PDO::FETCH_ASSOC);
$results = $statment->fetchAll(PDO::FETCH_ASSOC);
