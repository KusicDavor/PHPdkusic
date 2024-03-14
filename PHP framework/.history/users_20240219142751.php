<?php
require 'vendor/autoload.php';
use Databases\Database;

$database = Database::getInstance();
$pdo = $database->connect();

$statment = $pdo->prepare('SELECT * FROM korisnici WHERE `type`=:type LIMIT 1');
$statment->bindValue('type', 'korisnici');
$statment->execute();

try {
    $stmt = $pdo->query("SELECT * FROM korisnici");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the results
    foreach ($users as $user) {
        echo "User ID: " . $user['id'] . ", Username: " . $user['ime'] . ", spol: " . $user['dob'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$results = $statment->fetch(PDO::FETCH_ASSOC);
$results = $statment->fetchAll(PDO::FETCH_ASSOC);
