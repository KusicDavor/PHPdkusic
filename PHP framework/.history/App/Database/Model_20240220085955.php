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
        $columns = implode(', ', array_keys($this->attributes));
        $values = ':' . implode(', :', array_keys($this->attributes));
        $setClause = [];
        foreach ($this->attributes as $column => $value) {
            $setClause[] = "$column = :$column";
        }
        $setClause = implode(', ', $setClause);
        $sql = "UPDATE {$this->table} SET $setClause WHERE $this->primaryKey = :id";
        echo $sql;
        $stmt = Connection::getInstance()->getPdo()->prepare($sql);
        foreach ($this->attributes as $column => $value) {
            echo "<br>";
            echo $this->attributes[$column] ."<br>";
            $stmt->bindValue(":$column", $value);
        }
        $stmt->bindValue(':id', $this->primaryKey);
        return $stmt->execute();
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
