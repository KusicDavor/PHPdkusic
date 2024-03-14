<?php
namespace Database;
use Database\Connection;
use PDO;
class Model {
    protected $table;
    protected $primaryKey = 'id';
    protected $attributes = [];

    public function save() {
        if (!empty($this->attributes[$this->primaryKey])) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    protected function insert() {
        $columns = implode(', ', array_keys($this->attributes));
        $placeholders = ':' . implode(', :', array_keys($this->attributes));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = Connection::getInstance()->connect()->prepare($sql);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        var_dump($stmt;
        $result = $stmt->execute();
        return $result;
    }

    protected function update() {
        $columns = '';
        foreach ($this->attributes as $key => $value) {
            if ($key !== $this->primaryKey) {
                $columns .= "$key = :$key, ";
            }
        }
        $columns = rtrim($columns, ', ');

        $sql = "UPDATE {$this->table} SET $columns WHERE {$this->primaryKey} = :{$this->primaryKey}";
        $stmt = Connection::getInstance()->connect()->prepare($sql);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

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
