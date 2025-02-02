<?php
namespace Database;
use PDO;
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
        $host = 'localhost';
        $dbname = 'prvi_zadatak';
        $username = 'prvi_zadatak';
        $password = 'zadatak';

        $dsn = "mysql:host=$host;dbname=$dbname";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = new PDO($dsn, $username, $password);
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        return $this->pdo;
    }
}