<?php
namespace Database;
use PDO;
class Connection {
    private static $instance;
    private $pdo;

    public function __construct() {}

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
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $this->pdo = new PDO($dsn, $username, $password, $options);
        return $this->pdo;
    }

    public function getPdo() {
        return $this->pdo;
    }

     // vraća jedan red
     public function fetchAssoc($query, $params = []) {
        $query .= ' LIMIT 1';
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // vraća sve retke
    public function fetchAssocAll($query) {
        $stmt = Connection::getInstance()->connect()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($table, $data) {
        
        $isBatchInsert = is_array(reset($data));
        if (!$isBatchInsert) {
            $data = [$data];
        }

        $columns = implode(', ', array_keys(reset($data)));
        $placeholders = '(' . implode(', ', array_fill(0, count($data[0]), '?')) . ')';
        $values = implode(', ', array_fill(0, count($data), $placeholders));

        $query = "INSERT INTO $table ($columns) VALUES $values";
        $statement = $this->pdo->prepare($query);


        $flattenedData = [];
        foreach ($data as $row) {
            $flattenedData = array_values($row);
        }

        $statement->execute($flattenedData);
        return $statement->rowCount();
    }

    public function update($table, $columnValues, $conditions) {
        $sql = "UPDATE $table SET ";
        $setValues = [];
        foreach ($columnValues as $column => $value) {
            $setValues[] = "$column = :$column";
        }
        $sql .= implode(", ", $setValues);

        if (!empty($conditions)) {
            $sql .= " WHERE ";
            $whereConditions = [];
            foreach ($conditions as $column => $conditionValue) {
                $whereConditions[] = "$column = :$column";
            }
            $sql .= implode(" AND ", $whereConditions);
        }

        $stmt = $this->pdo->prepare($sql);
        foreach ($columnValues as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        foreach ($conditions as $column => $conditionValue) {
            $stmt->bindValue(":$column", $conditionValue);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }
}