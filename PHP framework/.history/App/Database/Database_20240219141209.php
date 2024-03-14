<?php
namespace Database;
use PDO;
class Database {
    private static $instance;
    private $pdo;
    
    private function __construct() {
        $host = 'localhost';
$dbname = 'prvi_zadatak';
$username = 'prvi_zadatak';
$password = 'zadatak';

// Connect to the database using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
        $dsn = 'mysql:host=localhost;dbname=prvi_zadatak';
        $username = 'prvi_zadatak';
        $password = 'zadatak';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $this->pdo = new PDO($dsn, $username, $password, $options);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
        return $this->pdo;
    }
    
    public function disconnect() {
        $this->pdo = null;
    }
}