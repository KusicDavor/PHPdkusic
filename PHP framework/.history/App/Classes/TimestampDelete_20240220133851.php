<?php
namespace Classes;
use Database\Connection;
trait TimestampDelete {
    public static function softDelete($model) {
        $model->attributes['deleted_at'] = date('Y-m-d H:i:s');
    }

    public static function delete($model) {
        if ($model->id) {
            $pdo = Connection::getInstance()->getPdo();
            $stmt = $pdo->prepare("DELETE FROM your_table WHERE id = :id");
            $stmt->execute(['id' => $model->id]);
        } else {
            echo "Traženi korisnik ne postoji u bazi. Provjeri upisani \"id\".";
        }
    }

    public 
}