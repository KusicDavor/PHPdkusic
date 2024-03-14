<?php
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    use Timestamp;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;
    public $created_at;
    public $updated_at;

    public function __construct(string $ime, string $spol, int $dob, ?int $id = null) {
        $this->attributes= [
                'ime' => $ime,
                'spol' => $spol,
                'dob' => $dob
             ];
        if ($id !== null) {
            $this->attributes['id'] = $id;
        }

        if (in_array('Timestamp', class_uses($this))) {
            $this->attributes = [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at

            self::setTimestamps();
        }
    }
}