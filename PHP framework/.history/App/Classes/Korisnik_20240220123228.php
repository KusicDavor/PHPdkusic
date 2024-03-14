<?php
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    use TimestampCreated;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;
    public TimestampCreated $tc;

    public function __construct(string $ime, string $spol, int $dob, ?int $id = null) {
        $this->tc->setTimestamp()->creating();
        $this->attributes= [
                'ime' => $ime,
                'spol' => $spol,
                'dob' => $dob
             ];

        if ($id !== null) {
            $this->attributes['id'] = $id;
        }
    }
}