<?php 
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    use Timestamp;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;

    public function __construct() {
        parent::__construct(); // Pozivamo konstruktor roditeljske klase

        // Ako klasa koristi trait Timestampable, pozivamo metodu za stvaranje timestamp stupaca
        if (in_array(Timestampable::class, class_uses($this))) {
            Timestampable::createTimestampColumns();
        }
    }
}