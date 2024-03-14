<?php
namespace Classes;
use Database\Model;
use Classes\TimestampCreate;
class Korisnik extends Model {
    use TimestampCreate;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;

    public function __construct(string $ime, string $spol, int $dob, ?int $id = null) {
        $classTraits = class_uses(get_class($this));

        $this->attributes= [
                'ime' => $ime,
                'spol' => $spol,
                'dob' => $dob
             ];

        if (isset($classTraits[TimestampCreate::class]) && $id !== null) {
            TimestampCreate::updateTimestamp($this);
            $this->attributes['id'] = $id;
        } else if (isset($classTraits[TimestampCreated::class])) {
            TimestampCreated::setTimestamp($this);
        } else if ($id !== null) {
            $this->attributes['id'] = $id;
        }
    }
}