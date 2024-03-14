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
                $this->id = $id;
    } else {
            $classTraits = class_uses(get_class($this));
            $this->attributes= [
                    'ime' => $ime,
                    'spol' => $spol,
                    'dob' => $dob
                ];
            
            if (isset($classTraits[TimestampCreate::class]) && $id !== null) {
                TimestampCreate::updateTimestamp($this);
                $this->attributes['id'] = $id;
            } else if (isset($classTraits[TimestampCreate::class])) {
                TimestampCreate::setTimestamp($this);
            } else if ($id !== null) {
                $this->attributes['id'] = $id;
            }
        }
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIme($ime) {
        $this->ime = $ime;
    }

    public function setSpol($spol) {
        $this->spol = $spol;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }
}