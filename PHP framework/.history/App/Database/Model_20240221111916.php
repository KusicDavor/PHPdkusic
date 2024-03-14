<?php
namespace Database;
use Classes\Korisnik;
use Database\Connection;
use PDO;
use Classes\TimestampDelete;
use ReflectionClass;
use ReflectionProperty;
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

    public static function find($primaryKey) : Model {
        $model = new static();
        $sql = "SELECT * FROM {$model->table} WHERE {$model->primaryKey} = :primaryKey";
        $stmt = Connection::getInstance()->connect()->prepare($sql);
        $stmt->bindValue(':primaryKey', $primaryKey);
        $stmt->execute();
        $result = $stmt->fetchObject($model::class);
        unset($result->attributes);
        return $result;
    }

    public function toArray() : array {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        $result = [];
    
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $result[$propertyName] = $this->$propertyName;
        }
        return $result;
    }

    public function delete() {
        if ($this::find($this->attributes['id']) !== null) {
                print_r($this);
                $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
                $stmt = Connection::getInstance()->getPdo()->prepare($sql);
                $stmt->bindValue(':id', $this->attributes['id']);
                return $stmt->execute();
            
        }
    }