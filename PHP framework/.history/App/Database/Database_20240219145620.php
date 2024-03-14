<?php
namespace Database;
use PDO;
use PDOException;
class Database {
    private static $instance;
    private $pdo;

    private function __construct() {}

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
    try {
        $host = 'localhost';
        $dbname = 'prvi_zadatak';
        $username = 'prvi_zadatak';
        $password = 'zadatak';

        $dsn = "mysql:host=$host;dbname=$dbname";
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully<br>";
        } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
    }
}