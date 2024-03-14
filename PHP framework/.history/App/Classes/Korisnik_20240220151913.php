<?php
namespace Classes;
use Database\Model;
use Classes\TimestampCreate;
use Classes\TimestampDelete;
class Korisnik extends Model {
    use TimestampCreate;
    use TimestampDelete;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;
    public $id;

    public function __construct(?string $ime = null, ?string $spol = null, ?int $dob = null, int $id = null) {
        if ($id !== null) {
            
    } else {

    }
    }
}