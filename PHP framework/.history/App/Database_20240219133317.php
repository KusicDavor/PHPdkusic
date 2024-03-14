<?php
namespace App;
use PDO;
class Database {
    private static $instance = null;
    private $pdo;

    public function connect() {
        $config = [
            'driver' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
        ];

        // Connect to the database using the configuration settings
        // For example, using PDO:
        $pdo = new \PDO(
            $config['driver'] . ':host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['database'],
            $config['username'],
            $config['password']
        );

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}