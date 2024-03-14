<?php
namespace Database;
use Database\Connection;
use PDO;
class Model {
    protected $table;
    protected $primaryKey = 'id';
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

     function update() {
        protected function update($primaryKeyValue) {
            // Get the table name from the Model instance
            $tableName = $this->table;
    
            // Construct the SQL query to update the record
            $sql = "UPDATE $tableName SET ";
    
            // Construct the SET clause of the SQL query
            $setClause = [];
            foreach ($this->attributes as $column => $value) {
                $setClause[] = "$column = :$column";
            }
            $sql .= implode(', ', $setClause);
    
            // Add the WHERE clause to specify which record to update
            $sql .= " WHERE primary_key_column = :primary_key_value";
    
            // Prepare and execute the SQL statement
            $statement = $this->pdo->prepare($sql);
            
            // Bind values for SET clause
            foreach ($this->attributes as $column => $value) {
                $statement->bindValue(":$column", $value);
            }
    
            // Bind value for WHERE clause
            $statement->bindValue(':primary_key_value', $primaryKeyValue);
    
            // Execute the statement
            return $statement->execute();
        }
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
