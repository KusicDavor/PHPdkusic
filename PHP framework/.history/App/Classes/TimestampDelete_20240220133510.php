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
            $this->setDeletedAt();
    
            // Ovdje možete izvršiti dodatne radnje nakon brisanja objekta
            // Na primjer, ažuriranje svojstava objekta, spremanje u log datoteku itd.
        } else {
            // Objekt još nije spremljen u bazu, pa nije moguće izvršiti brisanje
            // Možete dodati odgovarajući tretman ove situacije prema vašim potrebama
            echo "Objekt nije spremljen u bazu, pa nije moguće izvršiti brisanje.";
        }
    }
}