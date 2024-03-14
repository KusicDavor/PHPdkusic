<?php
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

        // Flatten the data array
        $flattenedData = [];
        foreach ($data as $row) {
            $flattenedData = array_merge($flattenedData, array_values($row));
        }

        // Execute the query with flattened data
        $statement->execute($flattenedData);

        // Return the number of affected rows
        return $statement->rowCount();
    }
}