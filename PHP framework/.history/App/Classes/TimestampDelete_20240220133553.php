<?php
namespace Classes;
use Database\Connection;
trait TimestampDelete {
    public static function softDelete($model) {
        $model->attributes['deleted_at'] = date('Y-m-d H:i:s');
    }

    public function delete() {
        if ($this->id) {
            $pdo = Connection::getInstance()->getPdo();
            $stmt = $pdo->prepare("DELETE FROM your_table WHERE id = :id");
            $stmt->execute(['id' => $this->id]);
        } else {
            echo "Traženi korisnik ne postoji u bazi. Provjeri  nije spremljen u bazu, pa nije moguće izvršiti brisanje.";
        }
    }
}