<?php
namespace Databases;
use PDO;
class Connection {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

        // vraća jedan red
    public function fetchAssocOne($query, $params = []) {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // vraća sve retke
    public function fetchAssocAll($query, $params = []) {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
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
        // Konstruirajte SQL upit za ažuriranje
        $sql = "UPDATE $table SET ";
        $setValues = [];
        foreach ($columnValues as $column => $value) {
            $setValues[] = "$column = :$column";
        }
        $sql .= implode(", ", $setValues);

        // Dodajte uvjete ako su zadani
        if (!empty($conditions)) {
            $sql .= " WHERE ";
            $whereConditions = [];
            foreach ($conditions as $column => $conditionValue) {
                $whereConditions[] = "$column = :$column";
            }
            $sql .= implode(" AND ", $whereConditions);
        }

        // Pripremite i izvršite SQL upit
        $stmt = $this->pdo->prepare($sql);
        foreach ($columnValues as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        foreach ($conditions as $column => $conditionValue) {
            $stmt->bindValue(":$column", $conditionValue);
        }
        $stmt->execute();

        // Vratite broj redaka koji su ažurirani
        return $stmt->rowCount();
    }
}