<?php
use Databases\Database;

// Connect to the database using PDO
try {
    $database = Database::getInstance();
    $pdo = $database->connect();

    //$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Query the users table and display the results
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
?>