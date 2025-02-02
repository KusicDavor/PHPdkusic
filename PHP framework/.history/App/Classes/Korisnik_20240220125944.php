<?php
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    use TimestampCreated;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;

    public function __construct(string $ime, string $spol, int $dob, ?int $id = null) {

        if (trait_exists(TimestampCreated::class) && in_array(TimestampCreated::class, class_uses('Korisnik'))) {
            echo "Korisnik uses TimestampCreated.";
        } else {
            echo "Korisnik does not use TimestampCreated.";
        }

    //     $this->attributes= [
    //             'ime' => $ime,
    //             'spol' => $spol,
    //             'dob' => $dob
    //          ];

    //     if ($id !== null) {
    //         $this->attributes['id'] = $id;
    //         TimestampCreated::updateTimestamp($this);
    //     } else {
    //         TimestampCreated::setTimestamp($this);
    //     }
    }
}