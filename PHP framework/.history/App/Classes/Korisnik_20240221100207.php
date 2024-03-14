<?php
namespace Classes;
use Database\Model;
use Classes\TimestampCreate;
use Classes\TimestampDelete;
class Korisnik extends Model {
    use TimestampCreate;
    //use TimestampDelete;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;

    public function setIme($ime) {
        $this->ime = $ime;
        $this->attributes['ime'] = $ime;
    }
    public function setSpol($spol) {
        $this->spol = $spol;
        $this->attributes['spol'] = $spol;
    }
    public function setDob($dob) {
        $this->dob = $dob;
        $this->attributes['dob'] = $dob;
    }

    public function __construct(string $ime, string $spol, int $dob, int $id) {
        $this->ime = $ime;
        $this->spol = $spol;
        $this->dob = $dob;

        $classTraits = class_uses(get_class($this));
        $this->attributes= [
                'ime' => $this->$ime,
                'spol' => $this->$spol,
                'dob' => $th$dob
             ];
             
        if (isset($classTraits[TimestampCreate::class]) && $id !== null) {
            TimestampCreate::updateTimestamp($this);
            $this->attributes['id'] = $this->$id;
        } else if (isset($classTraits[TimestampCreate::class])) {
            TimestampCreate::setTimestamp($this);
        } else if ($id !== null) {
            $this->attributes['id'] = $this->$id;
        }
    }
}