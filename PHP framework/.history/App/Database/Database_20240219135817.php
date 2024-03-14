<?php
namespace Classes;
use PDO;
class Database {
    private static $instance;
    private $pdo;
    private function __construct() {
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