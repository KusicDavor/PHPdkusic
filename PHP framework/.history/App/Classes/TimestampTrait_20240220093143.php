<?php
namespace Classes;
use Database\Connection;
class Times {
    
    // Metoda za automatsko postavljanje vrijednosti timestampova prilikom kreiranja zapisa
    public static function bootTimestampable() {
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = $model->freshTimestamp();
        });

        static::updating(function ($model) {
            $model->updated_at = $model->freshTimestamp();
        });
    }

    // Metoda za stvaranje stupaca 'created_at' i 'updated_at' u bazi podataka
    public static function createTimestampColumns() {
        $pdo = Connection::getInstance()->getPdo();
        $tableName = (new static)->getTable();

        $sql = "ALTER TABLE $tableName ADD created_at TIMESTAMP NULL DEFAULT NULL,
                                          ADD updated_at TIMESTAMP NULL DEFAULT NULL";
        $pdo->exec($sql);
    }

    // Metoda za brisanje stupaca 'created_at' i 'updated_at' iz baze podataka
    public static function dropTimestampColumns() {
        $pdo = Connection::getInstance()->getPdo();
        $tableName = (new static)->getTable();

        $sql = "ALTER TABLE $tableName DROP COLUMN created_at,
                                          DROP COLUMN updated_at";
        $pdo->exec($sql);
    }

    // Omogućava pristup atributima created_at i updated_at izvan klase
    public function getCreatedAtColumn() {
        return 'created_at';
    }

    public function getUpdatedAtColumn() {
        return 'updated_at';
    }

    // Definira freshTimestamp koristeći ugrađene funkcije PHP-a
    protected function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
}