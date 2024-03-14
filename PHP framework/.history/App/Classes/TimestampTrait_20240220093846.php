<?php
use Database\Connection;
class Timestamp {
    
    // postavlja timestampove
    public static function bootTimestampable() {
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = $model->freshTimestamp();
        });

        static::updating(function ($model) {
            $model->updated_at = $model->freshTimestamp();
        });
    }

    // kreira timestamp stupce u tablici
    public static function createTimestampColumns() {
        $pdo = Connection::getInstance()->getPdo();
        $tableName = (new static)->getTable();

        $sql = "ALTER TABLE $tableName ADD created_at TIMESTAMP NULL DEFAULT NULL,
                                          ADD updated_at TIMESTAMP NULL DEFAULT NULL";
        $pdo->exec($sql);
    }

    // briše timestamp stupce u tablici
    public static function dropTimestampColumns() {
        $pdo = Connection::getInstance()->getPdo();
        $tableName = (new static)->getTable();

        $sql = "ALTER TABLE $tableName DROP COLUMN created_at,
                                          DROP COLUMN updated_at";
        $pdo->exec($sql);
    }

    // vraća timestamp created_at
    public function getCreatedAtColumn() {
        return 'created_at';
    }

    // vraća timestamp updated_at
    public function getUpdatedAtColumn() {
        return 'updated_at';
    }

    // daje trenutni timestamp
    protected function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}