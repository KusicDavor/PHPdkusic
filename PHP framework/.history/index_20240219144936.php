<?php
require 'vendor/autoload.php';
use Databases\Database;
use Http\Request;

// $parameters = [
//     'ime' => 'DK',
//     'spol' => 'M',
//     'dob' => 22,
// ];

// // kontrola slanja GET ili POST metodom
// //  false - POST
// //  true - GET
// $metoda = true;
// if (!$metoda) {
//     $request = new Request($parameters);
//     $request->send('POST');
// } else {
//     $queryString = http_build_query($parameters);
//     $request = new Request(['url' => $_SERVER['REQUEST_URI'], 'query' => $queryString, 'method' => 'GET']);
//     $request->send('GET');
// }



$database = Database::getInstance();
$pdo = $database->connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
