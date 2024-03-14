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

        $dsn = 'mysql:host=localhost;dbname=prvi_zadatak';
        $username = 'prvi_zadatak';
        $password = 'zadatak';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "Connected successfully<br>";
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