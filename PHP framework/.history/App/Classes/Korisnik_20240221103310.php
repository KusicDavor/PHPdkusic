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

    public function __construct(?string $ime = null, ?string $spol = null, ?int $dob = null) {
        $this->ime = $ime;
        $this->spol = $spol;
        $this->dob = $dob;

        $this->attributes = [
            'ime' => $this->ime,
            'spol' => $this->spol,
            'dob' => $this->dob
        ];
   
        $classTraits = class_uses(get_class($this));
        if (isset($classTraits[TimestampCreate::class])) {
            TimestampCreate::setTimestamp($this);
        }
    }

    public function update() {
        $classTraits = class_uses(get_class($this));
        if (isset($classTraits[TimestampCreate::class])) {
            TimestampCreate::updateTimestamp($this);
        }
        $this::update();
    }
}