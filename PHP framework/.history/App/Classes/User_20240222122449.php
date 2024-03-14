<?php
namespace Classes;
use Database\Model;
use Classes\TimestampCreate;
use Classes\TimestampDelete;
class User extends Model {
    use TimestampCreate;
    use TimestampDelete;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;

    public function __construct(?string $ime = "null", ?string $spol = null, ?int $dob = null) {
$this->ime = $ime;
$this->spol = $spol;
$this->dob = $dob;
print_r($this);
        $this->attributes = [
            'ime' => $this->ime,
            'spol' => $this->spol,
            'dob' => $this->dob
        ];
   
        // provjera ako klasa koristi timestampove
        $classTraits = class_uses(get_class($this));
        if (isset($classTraits[TimestampCreate::class])) {
            TimestampCreate::setTimestamp($this);
        }
    }

    public function update() {
        // provjera ako klasa koristi timestampove
        $classTraits = class_uses(get_class($this));
        if (isset($classTraits[TimestampCreate::class])) {
            TimestampCreate::updateTimestamp($this);
        }
        Model::update();
    }

    public function delete() {
        // provjera ako klasa koristi timestampove
        $classTraits = class_uses(get_class($this));
        if (isset($classTraits[TimestampDelete::class])) {
            TimestampDelete::softDelete($this);
            Model::update();
        } else {
            Model::delete();
        }
    }
}