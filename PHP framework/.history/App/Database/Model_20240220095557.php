<?php
namespace Database;
use Database\Connection;
use PDO;
class Model {
    protected $table;
    public $primaryKey = 'id';
    public $attributes = [];

    public function save() {
        if (!empty($this->attributes[$this->primaryKey])) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    protected function insert() {
        $columns = implode(', ', array_keys($this->attributes));
        $values = ':' . implode(', :', array_keys($this->attributes));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        $stmt = Connection::getInstance()->getPdo()->prepare($sql);
        return $stmt->execute($this->attributes);
    }

    public function update() {
        $setClause = [];
        foreach ($this->attributes as $column => $value) {
            $setClause[] = "$column = :$column";
        }
        $setClause = implode(', ', $setClause);
        $sql = "UPDATE {$this->table} SET $setClause WHERE {$this->primaryKey} = :id";
        $stmt = Connection::getInstance()->getPdo()->prepare($sql);
        foreach ($this->attributes as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        $stmt->bindValue(':id', $this->attributes['id']);
        return $stmt->execute();
    }
    public function update1() {
        // Konstruiramo SQL upit za ažuriranje
        $sql = "UPDATE {$this->table} SET ";
        $setClause = [];
        foreach ($this->attributes as $column => $value) {
            $setClause[] = "$column = :$column";
        }
        $setClause .= implode(', ', $setClause);
        echo $sql;
        $sql .= " WHERE ";
        $conditionColumns = [];
        foreach ($this->attributes->condition as $column => $value) {
            $conditionColumns[] = "$column = :$column";
        }
        $sql .= implode(' AND ', $conditionColumns);

        // Pripremamo PDO pripremljeni upit
        $stmt = Connection::getInstance()->getPdo()->prepare($sql);

        // Bindamo vrijednosti parametara
        foreach ($this->attributes as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        foreach ($condition as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }

        // Izvršavamo SQL upit
        $statement->execute();

        // Vraćamo rezultat izvršavanja upita
        return $statement->rowCount(); // Broj ažuriranih redaka
    }

    public static function find($primaryKey) {
        $model = new static();
        $sql = "SELECT * FROM {$model->table} WHERE {$model->primaryKey} = :primaryKey";
        $stmt = Connection::getInstance()->connect()->prepare($sql);
        $stmt->bindValue(':primaryKey', $primaryKey);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function toArray() {
        return $this->attributes;
    }
}
