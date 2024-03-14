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
        if (in_array(Timestamp::class, class_uses($this))) {
            $this->createTimestampColumns(); // Pozivamo metodu za stvaranje timestamp stupaca
        }
    }
}