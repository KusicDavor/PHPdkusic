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
        // Ako klasa koristi trait Timestampable, pozivamo metodu za stvaranje timestamp stupaca
        if (in_array(Timestamp::trait, class_uses($this))) {
            Timestamp::createTimestampColumns();
        }
    }
}