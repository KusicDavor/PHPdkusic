<?php
namespace Database;
use Database\
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
        $stmt = Database::getInstance()->connect()->prepare($sql);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
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
        $stmt = Database::getInstance()->connect()->prepare($sql);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public static function find($primaryKey) {
        $model = new static();
        $sql = "SELECT * FROM {$model->table} WHERE {$model->primaryKey} = :primaryKey";
        $stmt = Database::getInstance()->connect()->prepare($sql);
        $stmt->bindValue(':primaryKey', $primaryKey);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function toArray() {
        return $this->attributes;
    }
}
