<?php
namespace Classes;
trait TimestampDelete {
    public static function softDelete($model) {
        $model->attributes['deleted_at'] = date('Y-m-d H:i:s');
    }

    public function delete() {
        if ($this->id) {
            // Izvršite logiku za brisanje objekta iz baze
            // Na primjer, ako koristite PDO, možete izvršiti SQL upit DELETE
            // Ovdje preporučujemo korištenje prepared statementa radi sigurnosti
            $pdo = Connection::getInstance()->getPdo();
            $stmt = $pdo->prepare("DELETE FROM your_table WHERE id = :id");
            $stmt->execute(['id' => $this->id]);
    
            // Postavite vremensku oznaku brisanja na trenutno vrijeme
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