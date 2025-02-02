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

    public function __construct(string $ime, string $spol, int $dob, ?int $id = null, ?string $created_at = null, ?string $updated_at = null) {
        $this->attributes= [
                'ime' => $ime,
                'spol' => $spol,
                'dob' => $dob
             ];

             if ($created_at !== null) {
                $this->attributes['created_at'] = $created_at;
            }
            if ($updated_at !== null) {
                $this->attributes['updated_at'] = $updated_at;
            }

        if ($id !== null) {
            $this->attributes['id'] = $this->$id;
            var_dump($this->attributes);
        }

        if (in_array(Timestamp::class, class_uses($this))) {
            $this->attributes = [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ];
            var_dump($this->attributes);
        }
    }
}