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
}