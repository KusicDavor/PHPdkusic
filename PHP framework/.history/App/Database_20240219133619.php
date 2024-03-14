<?php
namespace App;
use PDO;
class Database {
    private static $instance;
    private function __construct() {
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
        $config = [
            'driver' => getenv('DB_CONNECTION'),
            'host' => getenv('DB_HOST'),
            'port' => getenv('DB_PORT'),
            'database' => getenv('DB_DATABASE'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
        ];

        $pdo = new PDO(
            $config['driver'] . ':host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['database'],
            $config['username'],
            $config['password']
        );

        return $pdo;
    }
}