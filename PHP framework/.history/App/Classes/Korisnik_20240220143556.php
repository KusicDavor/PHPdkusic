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

    public function __construct(?string $ime = null, ?string $spol = null, ?int $dob = null, ?int $id = null) {
        $classTraits = class_uses(get_class($this));

        $this->attributes= [
                'ime' => $ime,
                'spol' => $spol,
                'dob' => $dob
             ];

        if (isset($classTraits[TimestampCreate::class]) && $this$id !== null) {
            echo "tu sam";
            TimestampCreate::updateTimestamp($this);
            $this->attributes['id'] = $id;
        } else if (isset($classTraits[TimestampCreate::class])) {
            TimestampCreate::setTimestamp($this);
        } else if ($id !== null) {
            $this->attributes['id'] = $id;
        }
    }
}